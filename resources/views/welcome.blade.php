@extends('layouts.app')

@section('title', 'Maju Bersama - Sistem POS')

@section('content')
<nav class="border-b border-gray-100 bg-white sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary flex items-center justify-center rounded text-secondary text-xl">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div>
                    <h1 class="text-primary font-bold text-lg leading-tight uppercase tracking-wide">Maju Bersama</h1>
                    <p class="text-muted text-[10px] font-medium uppercase tracking-widest">Sistem POS</p>
                </div>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#beranda" class="text-primary font-bold border-b-2 border-primary pb-1">Beranda</a>
                <a href="#fitur" class="text-muted font-semibold hover:text-primary transition">Fitur</a>
                <a href="#tentang" class="text-muted font-semibold hover:text-primary transition">Tentang</a>
                <a href="#harga" class="text-muted font-semibold hover:text-primary transition">Harga</a>
                <a href="#kontak" class="text-muted font-semibold hover:text-primary transition">Kontak</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                <a href="/login" class="text-primary font-semibold hover:text-primary-light transition flex items-center gap-2 border border-gray-200 px-4 py-2 rounded">
                    Masuk <i class="fa-solid fa-arrow-right-to-bracket text-sm"></i>
                </a>
                <a href="/register" class="bg-primary text-white px-5 py-2.5 rounded font-semibold hover:bg-primary-light transition flex items-center gap-2 shadow-lg shadow-primary/30">
                    Coba Gratis <i class="fa-solid fa-cart-shopping text-sm"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<section id="beranda" class="pt-16 md:pt-24 pb-12 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-8 relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-orange-50 border border-orange-100 text-orange-600 text-sm font-semibold">
                    <i class="fa-solid fa-star text-secondary"></i> Sistem POS Modern & Mudah Digunakan
                </div>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary leading-[1.1] tracking-tight">
                    Kelola Penjualan, <br>
                    <span class="text-secondary">Lebih Cepat dan Akurat.</span>
                </h2>
                
                <p class="text-muted text-lg font-medium max-w-lg leading-relaxed">
                    Sistem POS Maju Bersama membantu bisnis Anda mencatat transaksi, mengelola stok, dan laporan penjualan dalam satu sistem yang mudah digunakan.
                </p>

                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="/register" class="bg-primary text-white px-6 py-3.5 rounded font-bold hover:bg-primary-light transition shadow-lg shadow-primary/30 flex items-center gap-2">
                        <i class="fa-regular fa-square-check"></i> Mulai Sekarang
                    </a>
                    <a href="#demo" class="bg-white text-text px-6 py-3.5 rounded font-bold hover:bg-gray-50 transition border border-gray-200 flex items-center gap-2">
                        <i class="fa-solid fa-play"></i> Lihat Demo
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-8">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-text text-sm">Transaksi Cepat</h4>
                            <p class="text-xs text-muted mt-1">Proses penjualan hanya dalam hitungan detik</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-box"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-text text-sm">Kelola Stok Mudah</h4>
                            <p class="text-xs text-muted mt-1">Pantau stok barang secara real-time</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-text text-sm">Laporan Akurat</h4>
                            <p class="text-xs text-muted mt-1">Dapatkan laporan penjualan kapan saja</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative hidden lg:block">
                <div class="relative w-[140%] -right-[20%]">
                    <div class="bg-gray-900 rounded-3xl p-4 shadow-2xl border-4 border-gray-800">
                        <div class="bg-white rounded-xl overflow-hidden aspect-[16/10] relative flex">
                            <!-- Sidebar -->
                            <div class="w-1/4 bg-primary text-white p-4">
                                <div class="flex items-center gap-2 mb-8">
                                    <div class="w-6 h-6 bg-secondary rounded text-primary flex items-center justify-center text-[10px]"><i class="fa-solid fa-store"></i></div>
                                    <div class="font-bold text-sm">MAJU BERSAMA</div>
                                </div>
                                <div class="space-y-2">
                                    <div class="p-2 bg-white/10 rounded flex items-center gap-3 text-sm"><i class="fa-solid fa-chart-line w-4"></i> Dashboard</div>
                                    <div class="p-2 flex items-center gap-3 text-sm opacity-70"><i class="fa-solid fa-cart-shopping w-4"></i> Penjualan</div>
                                    <div class="p-2 flex items-center gap-3 text-sm opacity-70"><i class="fa-solid fa-box w-4"></i> Produk</div>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="w-3/4 bg-gray-50 p-4">
                                <div class="h-8 bg-white rounded border border-gray-200 mb-4 flex items-center px-3 text-gray-400 text-xs">Cari produk...</div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="bg-white p-3 rounded border border-gray-200 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mx-auto mb-2 flex items-center justify-center text-gray-300"><i class="fa-solid fa-image"></i></div>
                                        <div class="text-[10px] font-bold">Produk A</div>
                                        <div class="text-[10px] text-primary font-bold">Rp 10.000</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border border-gray-200 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mx-auto mb-2 flex items-center justify-center text-gray-300"><i class="fa-solid fa-image"></i></div>
                                        <div class="text-[10px] font-bold">Produk B</div>
                                        <div class="text-[10px] text-primary font-bold">Rp 15.000</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border border-gray-200 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mx-auto mb-2 flex items-center justify-center text-gray-300"><i class="fa-solid fa-image"></i></div>
                                        <div class="text-[10px] font-bold">Produk C</div>
                                        <div class="text-[10px] text-primary font-bold">Rp 5.000</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border border-gray-200 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mx-auto mb-2 flex items-center justify-center text-gray-300"><i class="fa-solid fa-image"></i></div>
                                        <div class="text-[10px] font-bold">Produk D</div>
                                        <div class="text-[10px] text-primary font-bold">Rp 25.000</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border border-gray-200 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mx-auto mb-2 flex items-center justify-center text-gray-300"><i class="fa-solid fa-image"></i></div>
                                        <div class="text-[10px] font-bold">Produk E</div>
                                        <div class="text-[10px] text-primary font-bold">Rp 8.000</div>
                                    </div>
                                    <div class="bg-white p-3 rounded border border-gray-200 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mx-auto mb-2 flex items-center justify-center text-gray-300"><i class="fa-solid fa-image"></i></div>
                                        <div class="text-[10px] font-bold">Produk F</div>
                                        <div class="text-[10px] text-primary font-bold">Rp 12.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Banner -->
<section class="bg-primary text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 divide-y md:divide-y-0 md:divide-x divide-white/10">
            <div class="flex items-center gap-4 py-4 md:py-0 md:px-4">
                <i class="fa-solid fa-bolt text-secondary text-2xl"></i>
                <div>
                    <h4 class="font-bold text-sm">Mudah Digunakan</h4>
                    <p class="text-xs text-white/70 mt-1">Antarmuka sederhana dan intuitif</p>
                </div>
            </div>
            <div class="flex items-center gap-4 py-4 md:py-0 md:px-4">
                <i class="fa-solid fa-shield-halved text-secondary text-2xl"></i>
                <div>
                    <h4 class="font-bold text-sm">Aman & Terpercaya</h4>
                    <p class="text-xs text-white/70 mt-1">Data tersimpan aman di cloud</p>
                </div>
            </div>
            <div class="flex items-center gap-4 py-4 md:py-0 md:px-4">
                <i class="fa-solid fa-headset text-secondary text-2xl"></i>
                <div>
                    <h4 class="font-bold text-sm">Dukungan 24/7</h4>
                    <p class="text-xs text-white/70 mt-1">Tim support siap membantu Anda</p>
                </div>
            </div>
            <div class="flex items-center gap-4 py-4 md:py-0 md:px-4">
                <i class="fa-solid fa-laptop-mobile text-secondary text-2xl"></i>
                <div>
                    <h4 class="font-bold text-sm">Akses di Mana Saja</h4>
                    <p class="text-xs text-white/70 mt-1">Gunakan di semua perangkat</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- System Info Section -->
<section id="fitur" class="py-20 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-primary mb-4">Sistem Terintegrasi untuk Bisnis Anda</h2>
            <p class="text-muted max-w-2xl mx-auto">
                Berbagai fitur canggih yang dirancang khusus untuk mempermudah operasional toko, minimarket, atau bisnis ritel Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">
                <div class="w-14 h-14 bg-blue-50 text-primary rounded-xl flex items-center justify-center text-2xl mb-6">
                    <i class="fa-solid fa-cash-register"></i>
                </div>
                <h3 class="text-xl font-bold text-text mb-3">Kasir (Point of Sale)</h3>
                <p class="text-muted text-sm leading-relaxed mb-4">
                    Proses checkout pelanggan dengan cepat. Mendukung berbagai metode pembayaran dan cetak struk instan.
                </p>
                <ul class="space-y-2 text-sm text-muted">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Pencarian produk cepat</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Tahan/Lanjut transaksi</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Multi metode pembayaran</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">
                <div class="w-14 h-14 bg-blue-50 text-primary rounded-xl flex items-center justify-center text-2xl mb-6">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <h3 class="text-xl font-bold text-text mb-3">Manajemen Inventori</h3>
                <p class="text-muted text-sm leading-relaxed mb-4">
                    Pantau stok barang Anda secara akurat. Dapatkan notifikasi saat stok menipis agar tidak kehabisan barang.
                </p>
                <ul class="space-y-2 text-sm text-muted">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Stok opname mudah</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Peringatan stok minimum</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Kategori & Varian produk</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">
                <div class="w-14 h-14 bg-blue-50 text-primary rounded-xl flex items-center justify-center text-2xl mb-6">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-bold text-text mb-3">Laporan & Analitik</h3>
                <p class="text-muted text-sm leading-relaxed mb-4">
                    Ambil keputusan bisnis yang lebih baik berdasarkan data. Lihat laporan penjualan harian, mingguan, hingga tahunan.
                </p>
                <ul class="space-y-2 text-sm text-muted">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Laba rugi otomatis</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Produk terlaris</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-success"></i> Ekspor ke Excel/PDF</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer class="bg-primary text-white pt-16 pb-8 border-t border-primary-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-white flex items-center justify-center rounded text-primary text-xl">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <span class="font-bold text-xl tracking-wide">MAJU BERSAMA</span>
                </div>
                <p class="text-white/70 text-sm max-w-md mb-6 leading-relaxed">
                    Solusi Point of Sale terbaik untuk memajukan bisnis ritel Anda. Kelola penjualan, stok, dan laporan dengan lebih mudah, cepat, dan akurat.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-secondary hover:text-primary transition"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-secondary hover:text-primary transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-secondary hover:text-primary transition"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-6">Perusahaan</h4>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><a href="#" class="hover:text-secondary transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Karir</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Blog</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Kontak</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-6">Dukungan</h4>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><a href="#" class="hover:text-secondary transition">Pusat Bantuan</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Status Sistem</a></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-white/50">
            <div>
                &copy; {{ date('Y') }} Maju Bersama POS. Hak Cipta Dilindungi.
            </div>
            <div>
                Dibuat dengan <i class="fa-solid fa-heart text-secondary mx-1"></i> untuk UMKM Indonesia
            </div>
        </div>
    </div>
</footer>
@endsection
