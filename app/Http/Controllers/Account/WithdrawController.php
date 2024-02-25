<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class WithdrawController extends Controller
{
    public function index(): View{

        return view('account.withdraw');

    }

    public function Withdraw(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric',
            'user_email' => 'required|email',
        ]);


        $user = User::where('email', $request->user_email)->first();

        if ($user) {

            $user->accounts()->create([
                'amount' => $request->amount,
                'type' => 'Debit',
                'details' => 'withdraw',
            ]);


            return redirect()->back()->with('success', 'Amount deposited successfully.');
        } else {

            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
