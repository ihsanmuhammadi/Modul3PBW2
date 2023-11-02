{{--// NAMA : IHSAN MUHAMMAD IQBAL
    // NIM : 6706220123
    // KELAS : 46-03 --}}

@extends('layouts.app')

@section('content')

<div class="container mt-4">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
