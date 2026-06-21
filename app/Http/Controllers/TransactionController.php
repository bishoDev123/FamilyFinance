<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Plan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    //
    public function store(StoreTransactionRequest $request, Plan $plan)
    {
        $response = Gate::inspect('create', [Transaction::class, $plan]);

        if ($response->denied()) {
            return back()->with('error', $response->message());
        }

        DB::transaction(function () use ($request, $plan) {
            $plan->transactions()->create([
                ...$request->validated(),
                'user_id' => auth()->id(),
            ]);

            if ($request->type === 'withdraw') {
                $plan->budget -= $request->amount;
            } elseif ($request->type === 'deposit') {
                $plan->budget += $request->amount;
            }
            $plan->save();
        });

        return back()->with('success', 'Transaction created successfully.');
    }

    public function index(Plan $plan)
    {
        return view('transactions.index', [
            'plan' => $plan,
            'transactions' => $plan->transactions()
                ->with('user')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function update(Transaction $transaction, UpdateTransactionRequest $request) {
        $response = Gate::inspect('update', $transaction);
        $plan = $transaction->plan;

        if ($response->denied()) {
            return back()->with('error', $response->message());
        }
        DB::transaction(function () use ($request, $transaction, $plan) {
            $oldAmount = $transaction->amount;
            $oldType = $transaction->type;
            $transaction->update($request->validated());

            if ($oldType === 'deposit') {
                $plan->budget -= $oldAmount;
            } else {
                $plan->budget += $oldAmount;
            }

            if ($transaction->type === 'deposit') {
                $plan->budget += $transaction->amount;
            } else {
                $plan->budget -= $transaction->amount;
            }
            $plan->save();
        });


        return back()->with('success', 'Transaction updated successfully.');
    }

    public function destroy(DeleteTransactionRequest $request, Transaction $transaction)
    {
        $confirmed = $request->boolean('confirm');
        DB::transaction(function () use ($request, $transaction, $confirmed) {
            $plan = $transaction->plan;
            if ($transaction->type === 'deposit') {
                $plan->decrement('budget', $transaction->amount);
            } else {
                $plan->increment('budget', $transaction->amount);
            }
            $transaction->delete();
        });

        return back()->with('success', 'Transaction deleted successfully.');
    }
}
