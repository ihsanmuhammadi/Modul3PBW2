<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::all();

        return view('koleksi.daftarKoleksi', compact(var_name: 'collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('koleksi.registrasi');
    }

    // NIM : 6706220123
    // NAMA : IHSAN MUHAMMAD IQBAL
    // KELAS : 46-03
    
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
