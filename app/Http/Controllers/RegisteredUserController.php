<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function index() {
        return view('register');
    }

    public function store(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        dd($request->all());
    }
}
