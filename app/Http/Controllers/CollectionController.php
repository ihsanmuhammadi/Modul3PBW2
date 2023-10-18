<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Datatables\CollectionsDatatable;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CollectionsDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $collection = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
            'namaPengarang' => $request->namaPengarang,
            'tahunTerbit' => $request->tahunTerbit
        ]);

        event(new Registered($collection));
        return redirect(RouteServiceProvider::COLLECTIONS);
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', ['collection' => $collection]);
    }
}
   // Nama : Ihsan Muhammad Iqbal
    // NIM : 6706220123
    // Kelas : 46-03
