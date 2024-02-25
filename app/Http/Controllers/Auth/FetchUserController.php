<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FetchUserController extends Controller
{
    public function showUserInfo()
    {

        $email = Auth::user()->email;

        $user = User::where('email', $email)->first();

        return view('dashboard')->with([
            'name' => $user->name,
            'email' => $user->email,
            'balance' => $user->balance,
        ]);
    }
}
