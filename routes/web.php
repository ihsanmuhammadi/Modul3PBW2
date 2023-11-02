<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Nama : Ihsan Muhammad Iqbal
// NIM : 6706220123
// Kelas : 46-03
Route::get('/', function () {
    return view('welcome');
});

// Route untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk daftar pengguna
Route::get('/user', [\App\Http\Controllers\ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('user');

// Route untuk show daftar pengguna
Route::get('/userView/{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->middleware(['auth', 'verified'])->name('userView');

// Route untuk update pengguna
Route::post('/userUpdate', [\App\Http\Controllers\UserController::class, 'update'])->middleware(['auth', 'verified'])->name('userUpdate');

// Route untuk daftar koleksi
Route::get('/koleksi', [\App\Http\Controllers\CollectionController::class, 'index'])->middleware(['auth', 'verified'])->name('koleksi');

// Route untuk tambah koleksi
Route::get('/koleksiTambah', [\App\Http\Controllers\CollectionController::class, 'create'])->middleware(['auth', 'verified'])->name('koleksiTambah');

// Route untuk store koleksi
Route::post('/koleksiStore', [\App\Http\Controllers\CollectionController::class, 'store'])->middleware(['auth', 'verified'])->name('koleksiStore');

// Route untuk show koleksi
Route::get('/koleksiView/{collection}', [\App\Http\Controllers\CollectionController::class, 'show'])->middleware(['auth', 'verified'])->name('koleksiView');

// Route untuk update koleksi
Route::post('/koleksiUpdate', [\App\Http\Controllers\CollectionController::class, 'update'])->middleware(['auth', 'verified'])->name('koleksiUpdate');

// Route untuk daftar transaksi
Route::get('/transaksi', [\App\Http\Controllers\TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');

// Route untuk tambah transaksi
Route::get('/transaksiTambah', [\App\Http\Controllers\TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');

// Route untuk store transaksi
Route::post('/transaksiStore', [\App\Http\Controllers\TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiStore');

// Route untuk show transaksi
Route::get('/transaksiView/{transaction}', [\App\Http\Controllers\TransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('transaksiView');

// Route untuk mendapat semua data detil transaksi
Route::get('/getAllDetailTransactions/{transactionId}', [\App\Http\Controllers\DetailTransactionController::class, 'getAllDetailTransactions'])->middleware(['auth', 'verified']);

// Route untuk edit detil transaksi
Route::get('detailTransactionKembalikan/{detailTransactionId}', [\App\Http\Controllers\DetailTransactionController::class, 'detailTransactionKembalikan'])->middleware(['auth', 'verified'])->name('detailTransactionKembalikan');

Route::post('detailTransactionUpdate', [\App\Http\Controllers\DetailTransactionController::class, 'update'])->middleware(['auth', 'verified'])->name('detailTransactionUpdate');

Route::get('/getAllTransactions', [\App\Http\Controllers\TransactionController::class, 'getAllTransactions'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();
