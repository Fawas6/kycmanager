<?php

namespace App\Http\Controllers\KycControllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
     /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Customer::class],
                'phone' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d'), 'after_or_equal:' . now()->subYears(100)->format('Y-m-d')],
                'cv' => ['required', 'mimes:pdf,doc,docx', 'max:2048'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password_confirmation' => ['required', 'string', 'max:255'],
            ]);

            $cvPath = $request->file('cv')->store('cv_files', 'public');

            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'dob' => $request->dob,
                'cv' => $cvPath,
                'password' => Hash::make($request->password),
            ]);

            // return response()->json(['error' => false, 'message' => 'Customer registered successfully', 'data' => $customer], 201);
            return redirect()->route('login_form')->with(['customer_name' => $customer->name]);
        }catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

}
