@extends('layouts.app')

@section('title', 'Maju Bersama')

@section('content')
<nav class="border-b border-secondary bg-white sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded text-secondary text-xl font-bold">

                </div>
                <div>
                    <h1 class="text-primary font-bold text-lg leading-tight uppercase tracking-wide">Maju Bersama</h1>
                    <p class="text-muted text-xs font-medium uppercase tracking-widest">Sistem Pencatatan Stok</p>
                </div>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#beranda" class="text-text font-semibold hover:text-primary transition">Beranda</a>
                <a href="#alur" class="text-muted font-semibold hover:text-primary transition">Cara Penggunaan</a>
            </div>

            <div class="hidden md:flex">
                <a href="/login" class="bg-primary text-white px-5 py-2.5 rounded font-semibold hover:bg-primary-light transition flex items-center gap-2">
                    Masuk <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<section id="beranda" class="py-16 md:py-24 bg-bg relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-bold text-text leading-tight tracking-tight">
                    Pencatatan Stok <br>
                    <span class="text-primary">Lebih Cepat,</span> <br>
                    Tanpa Kertas.
                </h2>
                <p class="text-muted text-lg font-medium max-w-lg leading-relaxed border-l-4 border-secondary pl-4">
                    Sistem pencatatan stok. Dirancang khusus untuk mempermudah petugas dalam merekap stok terkini produk.
                </p>

                <div class="flex gap-4 pt-4">
                    <a href="/login" class="bg-secondary text-text px-6 py-3 rounded font-bold hover:bg-warning transition shadow-sm border border-yellow-400">
                        Mulai Catat Stok
                    </a>
                </div>
            </div>
            <div class="hidden lg:block relative">
                <div class="absolute -inset-4 bg-primary/5 rounded-2xl transform rotate-2"></div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 w-full max-w-md shadow-xl relative z-10 mx-auto">
    
                    <div class="flex justify-between items-end mb-5 pb-4 border-b border-gray-100">
                        <div>
                            <div class="text-xs font-bold text-muted uppercase tracking-wider mb-1">
                                Toko Maju Bersama
                            </div>
                            <div class="font-bold text-primary text-lg">
                                Kelola Stok
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="text-xs font-bold text-muted uppercase tracking-wider mb-1">
                                Kategori
                            </div>
                            <div class="font-bold text-text text-lg">
                                Alat Tulis Kantor
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">

                        <div class="flex items-center justify-between p-3 bg-bg rounded border border-gray-100">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded bg-primary text-white flex items-center justify-center font-bold text-xs">
                                    1
                                </div>

                                <div>
                                    <div class="font-semibold text-text text-sm">
                                        Pulpen
                                    </div>
                                    <div class="text-xs text-muted">
                                        Stok Saat Ini : 24
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <button class="w-7 h-7 rounded bg-danger text-white flex items-center justify-center text-xs">
                                    -
                                </button>

                                <input 
                                    type="number"
                                    value="24"
                                    class="w-16 text-center border border-gray-200 rounded text-sm py-1"
                                    readonly
                                >

                                <button class="w-7 h-7 rounded bg-success text-white flex items-center justify-center text-xs">
                                    +
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-yellow-50 rounded border border-yellow-100">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded bg-primary text-white flex items-center justify-center font-bold text-xs">
                                    2
                                </div>

                                <div>
                                    <div class="font-semibold text-text text-sm">
                                        Pensil
                                    </div>
                                    <div class="text-xs text-warning">
                                        Stok Menipis : 3
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <button class="w-7 h-7 rounded bg-danger text-white flex items-center justify-center text-xs">
                                    -
                                </button>

                                <input 
                                    type="number"
                                    value="3"
                                    class="w-16 text-center border border-gray-200 rounded text-sm py-1"
                                    readonly
                                >

                                <button class="w-7 h-7 rounded bg-success text-white flex items-center justify-center text-xs">
                                    +
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-bg rounded border border-gray-100">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded bg-primary text-white flex items-center justify-center font-bold text-xs">
                                    3
                                </div>

                                <div>
                                    <div class="font-semibold text-text text-sm">
                                        Buku Tulis
                                    </div>
                                    <div class="text-xs text-muted">
                                        Stok Saat Ini : 18
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <button class="w-7 h-7 rounded bg-danger text-white flex items-center justify-center text-xs">
                                    -
                                </button>

                                <input 
                                    type="number"
                                    value="18"
                                    class="w-16 text-center border border-gray-200 rounded text-sm py-1"
                                    readonly
                                >

                                <button class="w-7 h-7 rounded bg-success text-white flex items-center justify-center text-xs">
                                    +
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="mt-5 pt-4 border-t border-gray-100">
                        <button class="w-full bg-primary text-white font-semibold py-2.5 rounded text-sm">
                            Simpan Perubahan Stok
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="alur" class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-text mb-2">Cara Kerja Sistem</h2>
            <p class="text-muted">Proses pencatatan stok dirancang sesederhana mungkin untuk efisiensi waktu.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="p-6 bg-bg rounded-lg border border-gray-100">
                <div class="w-10 h-10 bg-secondary text-text font-bold text-lg flex items-center justify-center rounded mb-4">
                    1
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Login</h3>
                <p class="text-muted text-sm leading-relaxed">
                    Masuk ke sistem menggunakan akun yang terdaftar.
                </p>
            </div>

            <div class="p-6 bg-bg rounded-lg border border-gray-100">
                <div class="w-10 h-10 bg-secondary text-text font-bold text-lg flex items-center justify-center rounded mb-4">
                    2
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Pilih Kelas & Tipe Presensi</h3>
                <p class="text-muted text-sm leading-relaxed">
                    Pilih kelas serta jenis presensi: harian atau per mata pelajaran.
                </p>
            </div>

            <div class="p-6 bg-bg rounded-lg border border-gray-100">
                <div class="w-10 h-10 bg-secondary text-text font-bold text-lg flex items-center justify-center rounded mb-4">
                    3
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Isi & Simpan Absensi</h3>
                <p class="text-muted text-sm leading-relaxed">
                    Tandai kehadiran siswa sesuai kondisi, lalu simpan data.
                </p>
            </div>

        </div>
    </div>
</section>

<footer class="border-t border-secondary bg-white p-5 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
        <div class="flex items-center gap-3 text-primary font-bold tracking-wide">
            
            Toko <span class="text-secondary">Maju</span> Bersama
        </div>
        <div class="text-gray-500">
            &copy; {{ date('Y') }} Hak Cipta Dilindungi.
        </div>
    </div>
</footer>
@endsection
