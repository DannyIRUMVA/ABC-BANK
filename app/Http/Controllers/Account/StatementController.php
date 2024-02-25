<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class StatementController extends Controller
{
    public function getStatement()
    {

      $email = Auth::user()->email;

      $userAccount = Account::whereHas('user', function($query) use ($email) {
        $query->where('email', $email);
            })->first();

      if (!$userAccount) {

        return redirect()->back()->with('error', 'User account not found.');

      }

      $statement = Account::where('user_id', $userAccount->user_id)
        ->orderBy('created_at', 'asc')
        ->paginate(5);

      $balance = $userAccount->amount;
      $statement[0]->balance = $balance - 0;

      foreach ($statement->slice(1) as $transaction) {

        if ($transaction->type == 'Credit') {

          $balance += $transaction->amount;

        } elseif ($transaction->type == 'Debit') {

          $balance -= $transaction->amount;

        }

        $transaction->balance = $balance;

      }

      return view('account.statement', compact('statement'));

    }

}
