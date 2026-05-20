@extends('layouts.dashboard')
@section('title', 'Detail Transaksi')

@section('content')
<section class="p-5">
    <div class="bg-primary p-2 rounded-lg shadow-md border-b-[5px] border-secondary relative overflow-hidden">

        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            <div class="absolute -top-16 -right-16 w-64 h-64 bg-white opacity-[0.03] rounded-full blur-2xl"></div>
            <div class="absolute top-1/4 right-1/3 w-2 h-2 bg-white rounded-full opacity-40 shadow-[0_0_10px_rgba(255,255,255,0.8)]"></div>
            <div class="absolute bottom-1/3 right-1/4 w-3 h-3 bg-secondary rounded-full"></div>
            <div class="absolute top-1/2 left-1/4 w-1.5 h-1.5 bg-white rounded-full opacity-30 transform rotate-45"></div>
            <div class="absolute bottom-8 left-12 w-3 h-3 border-2 border-white/20 rounded-full"></div>
        </div>

        <div class="relative z-10 px-4 py-6 md:px-8 md:py-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="w-full md:w-2/3 space-y-2">
                <h2 class="text-2xl md:text-3xl font-extrabold text-white leading-tight tracking-tight">
                    Detail Transaksi<br>
                    <span class="text-secondary">{{ $transaction->transaction_no }}</span>
                </h2>
                <p class="text-gray-200 text-xs md:text-sm max-w-md leading-relaxed">
                    Informasi lengkap mengenai transaksi penjualan dan rincian produk yang dibeli.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="p-5 pt-0">
    <div class="bg-white rounded-lg shadow-md border-t-[5px] border-primary max-w-3xl mx-auto overflow-hidden">
        
        <!-- Header Info -->
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row justify-between gap-4">
            <div class="space-y-1">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal Transaksi</span>
                <p class="font-bold text-text text-sm sm:text-base">{{ \Carbon\Carbon::parse($transaction->date)->isoFormat('D MMMM YYYY') }}</p>
            </div>
            <div class="space-y-1">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Nama Pelanggan</span>
                <p class="font-bold text-text text-sm sm:text-base">{{ $transaction->customer_name }}</p>
            </div>
            <div class="space-y-1">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Status Transaksi</span>
                <div>
                    @if(in_array(strtolower($transaction->status), ['completed', 'selesai']))
                        <span class="bg-emerald-100 text-emerald-800 text-xs px-2.5 py-1 rounded-full font-bold">Selesai</span>
                    @elseif(strtolower($transaction->status) == 'pending')
                        <span class="bg-amber-100 text-amber-800 text-xs px-2.5 py-1 rounded-full font-bold">Pending</span>
                    @elseif(in_array(strtolower($transaction->status), ['cancelled', 'batal']))
                        <span class="bg-rose-100 text-rose-800 text-xs px-2.5 py-1 rounded-full font-bold">Batal</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 text-xs px-2.5 py-1 rounded-full font-bold">{{ $transaction->status }}</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Detail Table -->
        <div class="p-6">
            <h3 class="font-extrabold text-primary text-base mb-4 flex items-center gap-2">
                <i class="fa-solid fa-list-check text-secondary"></i> Rincian Produk
            </h3>

            <div class="overflow-x-auto border border-gray-100 rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 font-semibold text-xs tracking-wider uppercase">
                            <th class="py-3 px-4 w-12 text-center">No</th>
                            <th class="py-3 px-4">Nama Produk</th>
                            <th class="py-3 px-4 text-right">Harga Satuan</th>
                            <th class="py-3 px-4 text-center">Jumlah (Qty)</th>
                            <th class="py-3 px-4 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm text-text">
                        @forelse ($transaction->details as $index => $detail)
                            <tr class="hover:bg-gray-50/40 transition">
                                <td class="py-3 px-4 text-center text-xs font-medium text-gray-400">
                                    {{ $index + 1 }}
                                </td>
                                <td class="py-3 px-4 font-bold text-text">
                                    {{ $detail->product->product_name ?? 'Produk Terhapus' }}
                                </td>
                                <td class="py-3 px-4 font-mono text-xs text-gray-500 text-right">
                                    Rp {{ number_format($detail->unit_price, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4 font-mono text-xs text-gray-500 text-center">
                                    {{ $detail->quantity }}
                                </td>
                                <td class="py-3 px-4 font-mono text-xs text-gray-500 text-right font-bold">
                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400 font-medium">
                                    Tidak ada rincian produk untuk transaksi ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Total Price Section -->
            <div class="mt-6 bg-primary/5 p-4 rounded-lg flex justify-between items-center border border-primary/10">
                <span class="font-extrabold text-primary text-base">Total Keseluruhan</span>
                <span class="font-mono text-xl text-primary font-extrabold">
                    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100 flex items-center justify-end">
            <a href="{{ route('transaction.index') }}"
               class="px-5 py-2.5 rounded bg-primary hover:bg-primary-light text-white font-bold text-sm transition shadow-md flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Daftar Transaksi
            </a>
        </div>

    </div>
</section>
@endsection
