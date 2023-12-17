<?php

namespace App\Http\Controllers\KycControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class RecordsController extends Controller
{
    // Function to display all user records for any individual polling units
    public function showRecords()
    {
        try {

            $user = Auth::user();

            $records = Customer::where('id', $user->id)->get();

            return view('kyc.dashboard', compact('records'));
        }catch (\Exception $e) {
            // Returns error response if there's any error
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function editRecords(Request $request) {
            try {
                $user = Auth::user();

                // Implement the logic to update the records
                $request->validate([
                    'name' => ['string', 'max:255'],
                    'email' => ['string', 'max:255'],
                    'phone' => ['string', 'max:255'],
                    'address' => ['string', 'max:255'],
                    'dob' => ['date', 'max:255'],
                ]);

                // Update the records where the id matches
                Customer::where('id', $user->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'dob' => $request->dob
                ]);

                // Display success message after updating the records
                $request->session()->flash('success', 'Records updated successfully.');

                return redirect()->back();

            } catch (\Exception $e) {
                // Return error response if there's any error
                return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
            }
    }

    public function deleteRecord($id) {
        try {
            // Find the record by its ID
            $record = Customer::find($id);

            if (!$record) {
                // Handle record not found
                return response()->json(['error' => true, 'message' => 'Task not found.'], 404);
            }

            // Delete the record
            $record->delete();

            // Redirect back with a success message
            return redirect('/dashboard')->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            // Return an error response if there's any error
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
