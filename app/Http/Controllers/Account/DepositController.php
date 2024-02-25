<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class DepositController extends Controller
{
    public function index(): View{

        return view('account.deposit');

    }

    public function Deposit(Request $request)
   {
       $request->validate([
           'amount' => 'required|numeric',
           'user_email' => 'required|email',
       ]);

       // Find the user by email
       $user = User::where('email', $request->user_email)->first();

       if ($user) {
           // Create a new account record for the user
           $user->accounts()->create([
               'amount' => $request->amount,
               'type' => 'Credit', // Assuming this is a deposit
               'details' => 'Deposit', // You can provide additional details here
           ]);

           // Redirect or return a response as needed
           return redirect()->back()->with('success', 'Amount deposited successfully.');
       } else {
           // Handle case where user is not found
           return redirect()->back()->with('error', 'User not found.');
       }
   }

}
