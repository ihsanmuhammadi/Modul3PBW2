<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collection;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Http\Request;
use App\Datatables\TransactionsDataTable;
use App\Datatables\DetailTransactionDataTable;
use Carbon\Carbon;
use DB;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaction.daftarTransaksi');
    }

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions')
        ->select(
            'transactions.id as id',
            'u1.fullname as peminjam',
            'u2.fullname as petugas',
            'tanggalPinjam as tanggalPinjam',
            'tanggalSelesai as tanggalSelesai'
        )
        ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
        ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
        ->orderBy('tanggalPinjam', 'asc')
        ->get();

        return Datatables::of($transactions)
        ->addColumn('aksi', function ($transaction) {
            $html = '
            <a class="waves-effect btn btn-success" href="'.url('transaksiView')."/".$transaction->id.'"><a class="material-icons">
            </a>';
            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $collections = Collection::get();
        return view('transaction.transaksiTambah', compact('users', 'collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idPeminjam' => 'required|integer|gt:0',
            'koleksi1' => 'required|integer|gt:0'
        ], [
            'idPeminjam.gt' => 'Pilih satu species',
            'koleksi1.gt' => 'Pilih jenis item'
        ]);

        // Membuat 1 object transaction dan simpan ke dalam tabel transactions
        $transaction = new Transaction;
        $transaction->userIdPeminjam = $request->idPeminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString();
        $transaction->save();

        // Mengambil last transaction id untuk digunakan pada proses insert detail transaction
        $lastTransactionIdStored = $transaction->id;

        // Membuat object detail transaction dan simpan ke dalam tabel detail transaction
        // Peminjaman koleksi 1
        $detilTransaksi1 = new DetailTransaction;
        $detilTransaksi1->transactionId = $lastTransactionIdStored;
        $detilTransaksi1->collectionId = $request->koleksi1;
        $detilTransaksi1->status = 1;
        $detilTransaksi1->save();
        // Mengurangi jumlah stok

        // Peminjaman koleksi 2
        if($request->koleksi2 > 0) {
            $detilTransaksi2 = new DetailTransaction;
            $detilTransaksi2->transactionId = $lastTransactionIdStored;
            $detilTransaksi2->collectionId = $request->koleksi2;
            $detilTransaksi2->status = 1;
            $detilTransaksi2->save();
        }

        // Peminjaman koleksi
        if($request->koleksi3 > 0) {
            $detilTransaksi3 = new DetailTransaction;
            $detilTransaksi3->transactionId = $lastTransactionIdStored;
            $detilTransaksi3->collectionId = $request->koleksi3;
            $detilTransaksi3->status = 1;
            $detilTransaksi3->save();
        }

        return redirect()->route('transaksi')->with('status', 'Peminjaman berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
        ->select(
            'transactions.id as id',
            'u1.fullname as fullnamePeminjam',
            'u2.fullname as fullnamePetugas',
            'tanggalPinjam as tanggalPinjam',
            'tanggalSelesai as tanggalSelesai',
        )
        ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
        ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
        ->where('transactions.id', '=', $transaction->id)
        ->orderBy('tanggalPinjam', 'asc')
        ->first();
        return view('transaction.transaksiView', compact('transactions'));
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
    public function update(Request $request, string $id)
    {
        //
    }

}
