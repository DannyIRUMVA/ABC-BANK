<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\DB; // Add the import statement for DB facade

class TransferController extends Controller
{
    public function index(): View
    {
        return view('account.transfer');
    }

    public function transfer(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|numeric|min:0',
        ]);

        $user = auth()->user();

        $senderAccount = $user->account;

        $receiver = User::where('email', $request->email)->first();

        $receiverAccount = $receiver->account;

        $totalCredits = Account::where('user_id', $user->id)
            ->where('type', 'Credit')
            ->sum('amount');

        $totalDebits = Account::where('user_id', $user->id)
            ->where('type', 'Debit')
            ->sum('amount');

        $balance = $totalCredits - $totalDebits;

        if ($balance < $request->amount) {
            return back()->with('error', 'Insufficient balance for transfer.');
        }

        $transactionDetails = "Transfer to  {$receiver->name}";

        try {
            DB::accounts(function () use ($senderAccount, $receiverAccount, $request, $transactionDetails, $user, $receiver) {
                $senderAccount->account()->create([
                    'user_id' => $user->id,
                    'amount' => -$request->amount,
                    'type' => 'Debit',
                    'details' => $transactionDetails,
                ]);

                $receiverAccount->account()->create([
                    'user_id' => $receiver->id,
                    'amount' => $request->amount,
                    'type' => 'Credit',
                    'details' => "Received from {$senderAccount->user->name}",
                ]);
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Transfer failed. Please try again later.');
        }

        return back()->with('success', 'Transfer successful.');
    }
}
