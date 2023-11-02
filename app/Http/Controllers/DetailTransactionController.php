<?php

namespace App\Http\Controllers;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class DetailTransactionController extends Controller
{
    public function getAllDetailTransactions($transactionId) {
        $detail_transactions = DB::table('detail_transactions as dt')
        ->select(
            'dt.id',
            'dt.tanggalKembali as tanggalKembali',
            't.tanggalPinjam as tanggalPinjam',
            'dt.status as statusType',
            DB::raw('(CASE WHEN dt.status="1" THEN "Pinjam"
                WHEN dt.status="2" THEN "Kembali"
                WHEN dt.status="3" THEN "Hilang"
                END) as status'
            ),
            'c.namaKoleksi as koleksi')
        ->join('collections as c', 'c.id', '=', 'collectionId')
        ->join('transactions as t', 't.id', '=', 'dt.transactionId')
        ->where('transactionId', '=', $transactionId)->get();

        return Datatables::of($detail_transactions)
        ->addColumn('aksi', function ($detail_transaction) {
            $html='';
            if($detail_transaction->statusType == "1"){
                $html = '
                <a class="waves-effect btn btn-success" href="'.url('detailTransactionKembalikan')."/".$detail_transaction->id.'"><a class="material-icons">
                </a>';
            }

            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function detailTransactionKembalikan($detailTransactionId) {
        $detailTransaction = DB::table('detail_transactions as dt')
        ->select(
            't.id as idTransaksi',
            'dt.id as idDetailTransaksi',
            'dt.tanggalKembali as tanggalKembali',
            't.tanggalPinjam as tanggalPinjam',
            'dt.status',
            'uPinjam.fullname as namaPeminjam',
            'uTugas.fullname as namaPetugas',
            'c.namaKoleksi as koleksi')
        ->join('collections as c', 'c.id', '=', 'collectionId')
        ->join('transactions as t', 't.id', '=', 'dt.transactionId')
        ->join('users as uPinjam', 't.userIdPeminjam', '=', 'uPinjam.id')
        ->join('users as uTugas', 't.userIdPetugas', '=', 'uTugas.id')
        ->where('dt.id', '=', $detailTransactionId)->first();

        return view('detailTransaction.detailTransactionKembalikan', compact('detailTransaction'));
    }
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->status == 1) {

        } else {
            $affected = DB::table('detail_transactions')
            ->where('id', $request->idDetailTransaksi)
            ->update([
                'status' => $request->status,
                'tanggalKembali' => Carbon::now()->toDateString()
            ]);
        }
        $transaction = Transaction::where('id', $request->idTransaksi)->first();
        return redirect('transaksiView/'.$request->idTransaksi)->with('transaction', $transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
