{{-- Nama : Ihsan Muhammad Iqbal
NIM : 6706220123
Kelas : 46-03 --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight: bold;">Rincian Pengguna</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th class="text-start">Full Name</th>
                    <td>{{ $user->fullname }}</td>
                </tr>
                <tr>
                    <th class="text-start">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="text-start">Phone Number</th>
                    <td>{{ $user->phoneNumber }}</td>
                </tr>
                <tr>
                    <th class="text-start">Address</th>
                    <td>{{ $user->adress }}</td>
                </tr>
                <tr>
                    <th class="text-start">Tanggal Lahir</th>
                    <td>{{ $user->birthdate }}</td>
                </tr>
                <tr>
                    <th class="text-start">Agama</th>
                    <td>{{ $user->agama }}</td>
                </tr>
                @php
                $gender = '';
                switch ($user->gender) {
                case 1:
                $gender = 'Pria';
                break;
                case 2:
                $gender = 'Wanita';
                break;
                }
                @endphp

{{-- Nama : Ihsan Muhammad Iqbal
NIM : 6706220123
Kelas : 46-03 --}}
                <tr>
                    <th class="text-start">Jenis Kelamin</th>
                    <td>{{ $gender }}</td>
                </tr>
            </table>
            <a href="{{ route('user') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
