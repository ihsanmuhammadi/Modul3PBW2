<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight: bold;">Rincian Koleksi</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th class="text-start">Nama Koleksi</th>
                    <td>{{ $collection->namaKoleksi }}</td>
                </tr>
                @php
                $jenisKoleksi = '';
                switch ($collection->jenisKoleksi) {
                case 1:
                $jenisKoleksi = 'Buku';
                break;
                case 2:
                $jenisKoleksi = 'Majalah';
                break;
                case 3:
                $jenisKoleksi = 'Cakram Digital';
                break;
                }
                @endphp
                <tr>
                    <th class="text-start">Jenis Koleksi</th>
                    <td>{{ $jenisKoleksi }}</td>
                </tr>
                <tr>
                    <th class="text-start">Waktu Dibuat</th>
                    <td>{{ $collection->createdAt }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Koleksi</th>
                    <td>{{ $collection->jumlahKoleksi }}</td>
                </tr>
                <tr>
                    <th class="text-start">Nama Pengarang</th>
                    <td>{{ $collection->namaPengarang }}</td>
                </tr>
                <tr>
                    <th class="text-start">Tahun Terbit</th>
                    <td>{{ $collection->tahunTerbit }}</td>
                </tr>
            </table>
            <a href="{{ route('koleksi') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
