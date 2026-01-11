<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() {

        // Add user Authorization to get only the plans that have the same foreign ID as the currently authenticated user

        $plans = Plan::all();
        return view('dashboard', ['plans' => $plans]);
    }

    public function show(Plan $plan) {

        // Add user authorization to only access the plan show pages owned by the user

        return view('plans.show', ['plan' => $plan]);
    }
}
