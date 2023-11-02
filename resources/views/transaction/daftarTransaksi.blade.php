@extends('layouts.app')
@section('content')


<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable'). DataTable({
            ajax:'{{ url("getAllTransactions") }}',
            serverSide: false,
            processing: true,
            deferRender: true,
            type: 'GET',
            destroy:true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'peminjam', name: 'peminjam'},
                {data: 'petugas', name: 'petugas'},
                {data: 'tanggalPinjam', name: 'tanggalPinjam'},
                {data: 'tanggalSelesai', name: 'tanggalSelesai'},
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false}
            ]
        });
    });
</script>
<div class="container mt-4">
        <div class="card">
            <div class="card-header">Manage Transaction</div>
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Petugas</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Selesai</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

