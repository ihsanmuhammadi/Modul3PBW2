<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight: bold;">Edit Koleksi</h1>
    <form method="POST" action="{{ route('koleksiUpdate') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $collection->id }}">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th class="text-start">ID Koleksi*</th>
                        <td>{{ $collection->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Nama Koleksi*</th>
                        <td>
                            <input type="text" name="namaKoleksi" value="{{ $collection->namaKoleksi }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-start">Jenis Koleksi*</th>
                        <td>
                            <select name="jenisKoleksi">
                                <option value="1" {{ $collection->jenisKoleksi === 1 ? 'selected' : '' }}>Buku</option>
                                <option value="2" {{ $collection->jenisKoleksi === 2 ? 'selected' : '' }}>Majalah</option>
                                <option value="3" {{ $collection->jenisKoleksi === 3 ? 'selected' : '' }}>Cakram Digital</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-start">Waktu Dibuat*</th>
                        <td>{{ $collection->createdAt }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Jumlah Koleksi*</th>
                        <td>
                            <input type="number" name="jumlahKoleksi" value="{{ $collection->jumlahKoleksi }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-start">Nama Pengarang*</th>
                        <td>
                            <input type="text" name="namaPengarang" value="{{ $collection->namaPengarang }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-start">Tahun Terbit*</th>
                        <td>
                            <input type="text" name="tahunTerbit" value="{{ $collection->tahunTerbit }}">
                        </td>
                    </tr>
                </table>
                <a href="{{ route('koleksi') }}" class="btn btn-secondary">Back</a>
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
