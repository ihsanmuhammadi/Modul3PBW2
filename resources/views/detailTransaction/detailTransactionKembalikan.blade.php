<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
        @extends('layouts.app')
        @section('content')
        <div class="container">
            <h1 class="my-4" style="font-weight: bold;">Edit Koleksi</h1>
            <form method="POST" action="{{ url('detailTransactionUpdate') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $detailTransaction->idDetailTransaksi }}">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-start">ID Transaksi*</th>
                                <td>
                                    <input type="text" name="idTransaksi" value="{{ $detailTransaction->idTransaksi }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">ID Detail Transaksi*</th>
                                <td>
                                    <input type="text" name="idDetailTransaksi" value="{{ $detailTransaction->idDetailTransaksi }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Peminjam*</th>
                                <td>
                                    <input type="text" name="idPeminjam" value="{{ $detailTransaction->namaPeminjam }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Petugas*</th>
                                <td>
                                    <input type="text" name="idPetugas" value="{{ $detailTransaction->namaPetugas }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Nama Koleksi*</th>
                                <td>
                                    <input type="text" name="koleksi" value="{{ $detailTransaction->koleksi }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Status*</th>
                                <td>
                                    <select name="status" id="status">
                                        <option value="1" {{ $detailTransaction->status === 1 ? 'selected' : '' }}>Pinjam</option>
                                        <option value="2" {{ $detailTransaction->status === 2 ? 'selected' : '' }}>Kembali</option>
                                        <option value="3" {{ $detailTransaction->status === 3 ? 'selected' : '' }}>Hilang</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <a href="{{ route('transaksi') }}" class="btn btn-secondary">Back</a>
                        <button class="btn btn-success">Update</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="reset">
                            Reset
                        <button>
                    </div>
                </div>
            </form>
        </div>
        @endsection
