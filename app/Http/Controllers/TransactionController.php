<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Plan;
use App\Models\Transaction;
use Illuminate\Http\Request;
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

        $plan->transactions()->create([
            'user_id' => $request->user()->id,
            'amount' => $request->amount,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        if ($request->type === 'withdraw') {
            $plan->budget -= $request->amount;
        } elseif ($request->type === 'deposit') {
            $plan->budget += $request->amount;
        }

        $plan->save();

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

        if ($response->denied()) {
            return back()->with('error', $response->message());
        }

        $transaction->update($request->validated());

        return back()->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        return "Can delete Transaction number $transaction->id";
    }
}
