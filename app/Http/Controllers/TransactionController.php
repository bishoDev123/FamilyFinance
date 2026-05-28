<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
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

        return 'hello world';

//        // Example logic:
//        // Prevent overspending
//
//        if ($request->type === 'expense' &&
//            $request->amount > $plan->remaining_budget) {
//
//            return back()->with('error', 'Not enough remaining budget.');
//        }
//
//        $plan->transactions()->create([
//            'user_id' => $request->user()->id,
//            'title' => $request->title,
//            'amount' => $request->amount,
//            'type' => $request->type,
//            'description' => $request->description,
//        ]);
//
    }
}
