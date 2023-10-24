{{-- Nama : Ihsan Muhammad Iqbal
NIM : 6706220123
Kelas : 46-03 --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight: bold;">Edit Pengguna</h1>

    <form method="POST" action="{{ route('userUpdate') }}">
        @csrf

        {{-- to detect id --}}
        <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    {{-- ID User --}}
                    <tr>
                        <th class="text-start">ID User*</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    {{-- Username --}}
                    <tr>
                        <th class="text-start">Username*</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    {{-- Fullname --}}
                    <tr>
                        <th class="text-start">Fullname*</th>
                        <td>
                            <input type="text" name="fullname" value="{{ $user->fullname }}">
                        </td>
                    </tr>
                    {{-- Password --}}
                    <tr>
                        <th class="text-start">Password*</th>
                        <td>
                            <input type="password" name="password" value="">
                        </td>
                    </tr>
                    {{-- Password confirmation --}}
                    <tr>
                        <th class="text-start">Konfirmasi Password*</th>
                        <td>
                            <input type="password" name="password_confirmation" value="">
                        </td>
                    </tr>
                    {{-- Email --}}
                    <tr>
                        <th class="text-start">Email*</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    {{-- Adress --}}
                    <tr>
                        <th class="text-start">Address*</th>
                        <td>
                            <input type="text" name="adress" value="{{ $user->adress }}">
                        </td>
                    </tr>
                    {{-- Phone Number --}}
                    <tr>
                        <th class="text-start">Phone Number*</th>
                        <td>
                            <input type="text" name="phoneNumber" value="{{ $user->phoneNumber }}">
                        </td>
                    </tr>
                    {{-- Birthdate --}}
                    <tr>
                        <th class="text-start">Birthdate*</th>
                        <td>{{ $user->birthdate }}</td>
                    </tr>
                    {{-- Agama --}}
                    <tr>
                        <th class="text-start">Agama*</th>
                        <td>
                            <input type="text" name="agama" value="{{ $user->agama }}">
                        </td>
                    </tr>
                    {{-- Gender --}}
                    <tr>
                        <th class="text-start">Jenis Kelamin*</th>
                        <td>
                            <select name="gender">
                                <option value="1" {{ $user->gender === 1 ? 'selected' : '' }}>Pria</option>
                                <option value="2" {{ $user->gender === 2 ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <a href="{{ route('user') }}" class="btn btn-secondary">Back</a>
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>

@endsection
