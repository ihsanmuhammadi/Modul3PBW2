<?php
    // NIM : 6706220123
    // NAMA : IHSAN MUHAMMAD IQBAL
    // KELAS : 46-03
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model {
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'jumlahKoleksi',
        'namaPengarang',
        'tahunTerbit'
    ];
}
