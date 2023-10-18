<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:100'],
            'adress' => ['required', 'string', 'max:1000'],
            'username' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthdate' => ['required', 'date'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'integer', 'max:4']
        ],
        [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username telah digunakan',
            'birthdate.before' => 'Tanggal lahir harus sebelum hari ini'
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'adress' => $request->adress,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
            'phoneNumber' => $request->phoneNumber,
            'agama' => $request->agama,
            'gender' => $request->gender
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
    // NIM : 6706220123
    // NAMA : IHSAN MUHAMMAD IQBAL
    // KELAS : 46-03
