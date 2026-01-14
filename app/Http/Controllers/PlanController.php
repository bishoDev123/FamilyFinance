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
        // only authorize the user to create a plan if they have less than 6 of them
        // validate the request parameters
        // create a database record with the request parameters and the id of the currently logged in user
        // redirect to the dashboard
    }

    public function edit(Plan $plan) {
        // only authorize the user to go the edit view of a certain page if they own the plan (UX)
    }

    public function update(Request $request, Plan $plan) {
        // authorize the user to send this post request only if they own the plan (security)
        // validate the request
        // update plan in question with the request parameters
        // redirect to show page
    }

    public function destroy(Plan $plan) {
        // authorize the user to delete the plan only if they own it
        // delete the record of this plan from the database
        // redirect to dashboard
    }
}
