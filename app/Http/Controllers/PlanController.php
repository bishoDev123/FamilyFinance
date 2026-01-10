<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::all();
        return view('dashboard', ['plans' => $plans]);
    }

    public function show(Plan $plan) {
        return view('plans.show', ['plan' => $plan]);
    }
}
