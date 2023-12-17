<?php

namespace App\Http\Controllers\KycControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email'],
                'password' => ['required'],
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::guard('web')->attempt($credentials)) {
                // Authentication passed
                return redirect('/dashboard');
            } else {
                // Authentication failed
                return redirect()->back();
            }

            // return response()->json(['error' => false, 'message' => 'Customer registered successfully', 'data' => $customer], 201);
            // return redirect()->url('/');
        }catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }
}
