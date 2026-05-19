<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/petugas/dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('role:admin');

    Route::get('/petugas/dashboard', function () {
        return view('petugas.dashboard');
    })->middleware('role:petugas');

    Route::get('/petugas/kelola-produk', [ProductController::class, 'index'])
    ->middleware('role:petugas')->name('petugas.kelola-produk');

    Route::get('/petugas/create', [ProductController::class, 'create'])
    ->middleware('role:petugas')->name('petugas.create');

    Route::post('/petugas/store', [ProductController::class, 'store'])
    ->middleware('role:petugas')->name('petugas.store');

    Route::put('/petugas/update/{product}', [ProductController::class, 'update'])
    ->middleware('role:petugas')
    ->name('petugas.update');

    Route::resource('product', ProductController::class);

    Route::get('/petugas/kelola-transaksi', [TransactionController::class, 'index'])
    ->middleware('role:petugas')->name('petugas.kelola-transaksi');

    Route::get('/petugas/transaksi/create', [TransactionController::class, 'create'])
    ->middleware('role:petugas')->name('petugas.transaksi.create');

    Route::post('/petugas/transaksi/store', [TransactionController::class, 'store'])
    ->middleware('role:petugas')->name('petugas.transaksi.store');

    Route::put('/petugas/transaksi/update/{transaction}', [TransactionController::class, 'update'])
    ->middleware('role:petugas')->name('petugas.transaksi.update');

    Route::resource('transaction', TransactionController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
