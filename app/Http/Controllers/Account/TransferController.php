<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class TransferController extends Controller
{
    public function index(): View{

        return view('account.transfer');

    }

    public function Transfer(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric',
            'email' => 'required|email',
        ]);


        $recipient = User::where('email', $request->email)->first();

        if ($recipient) {

            $recipientAccount = $recipient->account;

            if ($recipientAccount) {

                $sender = Auth::user();


                $recipientAccount->account()->create([
                    'amount' => $request->amount,
                    'type' => 'Credit',
                    'details' => "transfered by " . $sender->email,
                ]);


                $senderAccount = $sender->account;
                $senderAccount->account()->create([
                    'amount' => -$request->amount,
                    'type' => 'Debit',
                    'details' => "transfer for " . $recipient->email,
                ]);

                return redirect()->back()->with('success', 'Amount withdrawn successfully.');
            } else {
                return redirect()->back()->with('error', 'Recipient does not have an account.');
            }
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

}
