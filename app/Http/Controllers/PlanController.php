<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PlanController extends Controller
{
    public function index(Request $request) {
        $ownedPlans = $request->user()->ownedPlans;
        $memberPlans = $request->user()->memberPlans;

        $plans = $ownedPlans->merge($memberPlans)->unique('id');

        $ownedIds = $ownedPlans->pluck('id')->toArray();
        $memberIds = $memberPlans->pluck('id')->toArray();

        return view('dashboard', ['plans' => $plans, 'ownedIds' => $ownedIds, 'memberIds' => $memberIds]);
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
        return redirect()->route('dashboard')->with('success', 'Plan created successfully.');
    }

    public function edit(Plan $plan) {
        return view('plans.edit', ['plan' => $plan]);
    }

    public function update(UpdatePlanRequest $request, Plan $plan) {
        $plan->update($request->validated());

        return redirect()->route('dashboard')->with('success', 'Plan updated successfully.');
    }

    public function destroy(DeletePlanRequest $request, Plan $plan) {
        $plan->delete();
        return redirect()->route('dashboard')->with('success', 'Plan deleted successfully');
    }
}
