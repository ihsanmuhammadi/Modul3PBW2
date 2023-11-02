@extends('layouts.app')
@section('content')


<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable'). DataTable({
            ajax:'{{ url("getAllDetailTransactions") }}' + "/" + {{ $transactions->id }},
            serverSide: false,
            processing: true,
            deferRender: true,
            type: 'GET',
            destroy:true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'koleksi', name: 'koleksi'},
                {data: 'tanggalPinjam', name: 'tanggalPinjam'},
                {data: 'tanggalKembali', name: 'tanggalKembali'},
                {data: 'status', name: 'status'},
                {data: 'aksi', name: 'aksi'}
            ]
        });
    });
</script>
<div class="container mt-4">
        <div class="card">
            <div class="card-header">Detil Transaksi</div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th class="text-start">Nama Peminjam*</th>
                        <td>{{ $transactions->fullnamePeminjam }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Nama Petugas*</th>
                        <td>{{ $transactions->fullnamePetugas }}</td>
                    </tr>
                </table>
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Koleksi</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

