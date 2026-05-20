@extends('layouts.dashboard')
@section('title', 'Petugas Dashboard')

@section('content')
<!-- Header Section -->
<section class="p-5">
    <div class="bg-primary p-6 rounded-lg shadow-md border-b-[5px] border-secondary relative overflow-hidden">
        <!-- Abstract Shapes -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            <div class="absolute -top-16 -right-16 w-64 h-64 bg-white opacity-[0.03] rounded-full blur-2xl"></div>
            <div class="absolute top-1/4 right-1/3 w-2 h-2 bg-white rounded-full opacity-40 shadow-[0_0_10px_rgba(255,255,255,0.8)]"></div>
            <div class="absolute bottom-1/3 right-1/4 w-3 h-3 bg-secondary rounded-full"></div>
            <div class="absolute bottom-8 left-12 w-3 h-3 border-2 border-white/20 rounded-full"></div>
        </div>

        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="w-full md:w-2/3 space-y-2">
                <h2 class="text-2xl md:text-3xl font-extrabold text-white leading-tight tracking-tight">
                    Selamat Datang Kembali,<br>
                    <span class="text-secondary">{{ auth()->user()->name }}</span>
                </h2>
                <p class="text-gray-200 text-xs md:text-sm max-w-md leading-relaxed">
                    Anda login sebagai <strong class="text-secondary">Petugas</strong>. Catat transaksi masuk dan keluar serta pantau stok produk hari ini.
                </p>
            </div>
            
            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-lg border border-white/10 text-white text-xs font-semibold">
                <i class="fa-solid fa-clock text-secondary"></i>
                <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Stats Grid -->
<section class="px-5 pb-5">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Stat card 1: Total Produk -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-primary flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Total Produk</span>
                <p class="text-2xl font-extrabold text-text">{{ $totalProducts }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center">
                <i class="fa-solid fa-box text-sm"></i>
            </div>
        </div>

        <!-- Stat card 2: Total Kategori -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-secondary flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Kategori</span>
                <p class="text-2xl font-extrabold text-text">{{ $totalCategories }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-secondary/15 text-primary flex items-center justify-center">
                <i class="fa-solid fa-layer-group text-sm"></i>
            </div>
        </div>

        <!-- Stat card 3: Total Transaksi -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-emerald-500 flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Transaksi</span>
                <p class="text-2xl font-extrabold text-text">{{ $totalTransactions }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i class="fa-solid fa-cart-shopping text-sm"></i>
            </div>
        </div>

        <!-- Stat card 4: Total Pendapatan -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-purple-500 flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Pendapatan</span>
                <p class="text-base font-extrabold text-text truncate max-w-[150px]" title="Rp {{ number_format($totalRevenue, 0, ',', '.') }}">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </p>
            </div>
            <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                <i class="fa-solid fa-money-bill-wave text-sm"></i>
            </div>
        </div>
    </div>
</section>

<!-- Analytics & Warnings -->
<section class="px-5 pb-5 grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Chart Column (Line Chart for Last 7 Days) -->
    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 lg:col-span-2 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between pb-4 border-b border-gray-50">
                <h3 class="font-extrabold text-primary text-base">
                    <i class="fa-solid fa-chart-line text-secondary mr-2"></i> Grafik Penjualan (7 Hari Terakhir)
                </h3>
                <span class="text-xs text-gray-400 font-semibold">Omset Penjualan (Rp)</span>
            </div>
            <div class="mt-4 relative h-64">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Alert / Low Stock Column -->
    <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between pb-4 border-b border-gray-50 mb-4">
                <h3 class="font-extrabold text-primary text-base flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation text-rose-500"></i> Peringatan Stok Rendah
                </h3>
            </div>
            
            <div class="space-y-3 overflow-y-auto max-h-64">
                @forelse ($lowStockProducts as $p)
                    <div class="flex items-center justify-between p-2.5 rounded-lg bg-rose-50/50 border border-rose-100 hover:bg-rose-50 transition">
                        <div class="space-y-0.5 max-w-[70%]">
                            <h4 class="font-bold text-text text-sm truncate">{{ $p->product_name }}</h4>
                            <p class="text-xs text-gray-400">Harga: Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="bg-rose-100 text-rose-800 text-xs px-2.5 py-1 rounded font-extrabold">
                                Stok: {{ $p->stock }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-12 text-gray-400 gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-500 text-3xl"></i>
                        <p class="text-sm font-semibold text-text">Semua stok produk aman!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Recent Activities -->
<section class="px-5 pb-5">
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-extrabold text-primary text-base">
                <i class="fa-solid fa-history text-secondary mr-2"></i> Transaksi Terbaru
            </h3>
            <a href="{{ route('transaction.index') }}" class="text-xs text-primary font-bold hover:underline">
                Lihat Semua <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 font-semibold text-xs tracking-wider uppercase">
                        <th class="py-3 px-6">No Invoice</th>
                        <th class="py-3 px-6">Tanggal</th>
                        <th class="py-3 px-6">Pelanggan</th>
                        <th class="py-3 px-6 text-right">Total</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm text-text">
                    @forelse ($recentTransactions as $t)
                        <tr class="hover:bg-gray-50/40 transition">
                            <td class="py-3.5 px-6 font-bold text-primary">{{ $t->transaction_no }}</td>
                            <td class="py-3.5 px-6 text-gray-500">{{ \Carbon\Carbon::parse($t->date)->isoFormat('D MMM YYYY') }}</td>
                            <td class="py-3.5 px-6 font-semibold">{{ $t->customer_name }}</td>
                            <td class="py-3.5 px-6 font-mono text-right font-bold">Rp {{ number_format($t->total_price, 0, ',', '.') }}</td>
                            <td class="py-3.5 px-6 text-center">
                                @if(in_array(strtolower($t->status), ['completed', 'selesai']))
                                    <span class="bg-emerald-100 text-emerald-800 text-[10px] px-2.5 py-0.5 rounded-full font-bold">Selesai</span>
                                @elseif(strtolower($t->status) == 'pending')
                                    <span class="bg-amber-100 text-amber-800 text-[10px] px-2.5 py-0.5 rounded-full font-bold">Pending</span>
                                @else
                                    <span class="bg-rose-100 text-rose-800 text-[10px] px-2.5 py-0.5 rounded-full font-bold">Batal</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-6 text-center">
                                <a href="{{ route('transaction.show', $t->id) }}" class="inline-block p-1 bg-secondary/20 hover:bg-secondary/45 text-primary rounded transition" title="Detail Transaksi">
                                    <i class="fa-solid fa-eye text-xs px-1"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400 font-medium">Belum ada transaksi terbaru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Include ChartJS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('salesChart').getContext('2d');
        
        // Define theme colors matching Tailwind configs
        const primaryColor = '#1C355E';
        const secondaryColor = '#FFD028';

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Pendapatan Harian',
                    data: @json($chartValues),
                    borderColor: primaryColor,
                    backgroundColor: 'rgba(28, 53, 94, 0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: secondaryColor,
                    pointBorderColor: primaryColor,
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value / 1000000) + 'jt';
                                } else if (value >= 1000) {
                                    return 'Rp ' + (value / 1000) + 'rb';
                                }
                                return 'Rp ' + value;
                            },
                            font: {
                                size: 10
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.03)'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 10
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection