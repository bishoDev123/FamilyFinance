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
}
