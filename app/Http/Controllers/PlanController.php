<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PlanController extends Controller
{
    public function index(Request $request) {
        $plans = $request->user()->plans;
        return view('dashboard', ['plans' => $plans]);
    }

    public function show(Plan $plan) {
        Gate::authorize('view', $plan);
        return view('plans.show', ['plan' => $plan]);
    }

    public function create() {
        return view('plans.create');
    }

    public function store(Request $request) {
        $response = Gate::inspect('create', Plan::class);

        if ($response->denied()) {
            return back()->with('error', $response->message());
        }

        $request->validate([
           'title' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string', 'max:255'],
           'budget' => ['required', 'integer', 'min:1'],
        ]);
        $request->user()->plans()->create([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
        ]);
        return redirect()->route('dashboard');
    }

    public function edit(Plan $plan) {
        return view('plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request, Plan $plan) {
        Gate::authorize('update', $plan);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'budget' => ['required', 'integer', 'min:1'],
        ]);

        $plan->update([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
        ]);
        return redirect()->route('dashboard');
    }

    public function destroy(Plan $plan) {
        // authorize the user to delete the plan only if they own it
        // delete the record of this plan from the database
        // redirect to dashboard
    }
}
