<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

    // Nama : Ihsan Muhammad Iqbal
    // NIM : 6706220123
    // Kelas : 46-03
class UserController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    // Validate the request data
    $request->validate([
        'fullname' => ['required', 'string', 'max:100'],
        'password' => ['required', 'confirmed'],
        'phoneNumber' => ['required', 'string', 'max:20'],
        'adress' => ['required', 'string', 'max:1000'],
        'agama' => ['required', 'string', 'max:20'],
        'gender' => ['required', 'integer', 'max:4']
    ]);

    DB::table('users')
        ->where('id', $request->id)
        ->update([
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
            'adress' => $request->adress,
            'agama' => $request->agama,
            'gender' => $request->gender,
        ]);
        return redirect()->route('user');
    }
}
