<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\WelcomeMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        auth()->login($user);
        \Mail::to($user)->send(new WelcomeMessage($user));
        session()->flash('message', 'You are successfully signed in!');

        return redirect('/');
    }
}
