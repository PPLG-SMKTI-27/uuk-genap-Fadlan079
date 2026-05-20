@extends('layouts.dashboard')
@section('title', 'Buat Transaksi Baru')

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
                    Tambah Informasi<br>
                    <span class="text-secondary">Transaksi Baru</span>
                </h2>
                <p class="text-gray-200 text-xs md:text-sm max-w-md leading-relaxed">
                    Pastikan data sesuai.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="p-5 pt-0">
    <div class="bg-white rounded-lg shadow-md border-t-[5px] border-primary max-w-2xl mx-auto">

        <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-secondary/10 text-primary flex items-center justify-center shadow-inner">
                <i class="fa-solid fa-user-gear text-sm"></i>
            </div>
            <div>
                <h3 class="font-bold text-text text-base">Formulir Penambahan Data</h3>
            </div>
        </div>

        <form action="{{ route('transaction.store')}}" method="POST" class="p-6 space-y-5">
            @csrf

            <div class="space-y-1.5">
                <label for="date" class="block font-bold text-sm text-text">
                    Tanggal <span class="text-red-500">*</span>
                </label>
                <input type="date"
                       name="date"
                       class="w-full p-2.5 rounded border border-red-500 focus:ring-red-500/20 focus:border-red-500"
                       required>
            </div>

            <div class="space-y-1.5">
                <label for="customer_name" class="block font-bold text-sm text-text">
                    Nama Pelanggan <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="customer_name"
                       class="w-full p-2.5 rounded border border-red-500 focus:ring-red-500/20 focus:border-red-500"
                       placeholder="Masukkan nama pelanggan..."
                       required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Total Harga</label>

                <input
                    type="text"
                    id="total_price"
                    class="w-full border rounded-lg p-2 bg-gray-100"
                    readonly>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-sm text-text">
                    Produk <span class="text-red-500">*</span>
                </label>

                <select name="product_id"
                        id="product_id"
                        class="w-full p-2.5 rounded border"
                        required>

                    <option selected disabled>-- Pilih Produk --</option>

                    @foreach($products as $product)
                        <option
                            value="{{ $product->id }}"
                            data-price="{{ $product->price }}">

                            {{ $product->product_name }}
                            - Stok: {{ $product->stock }}
                            - Rp {{ number_format($product->price, 0, ',', '.') }}

                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold text-sm text-text">
                    Jumlah <span class="text-red-500">*</span>
                </label>

                <input type="number"
                    name="quantity"
                    id="quantity"
                    min="1"
                    class="w-full p-2.5 rounded border"
                    placeholder="Masukkan jumlah barang..."
                    required>
            </div>
  
            <div class="space-y-1.5">
                <label for="status" class="block font-bold text-sm text-text">
                    Status <span class="text-red-500">*</span>
                </label>
                <select name="status"
                        id="status"
                        class="w-full p-2.5 rounded border"
                        required>
                    <option disabled>-- Status --</option>
                    @foreach(['pending', 'completed', 'cancelled'] as $t)
                        <option value="{{ $t }}">
                            {{ $t}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ url()->previous() }}"
                   class="px-4 py-2.5 rounded border border-gray-300 bg-white hover:bg-gray-50 text-text font-semibold text-sm transition shadow-sm">
                    Batal
                </a>
                <button type="submit"
                        class="px-5 py-2.5 rounded bg-primary hover:bg-primary-light text-white font-bold text-sm transition shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk text-xs"></i> Simpan Transaksi
                </button>
            </div>
        </form>

    </div>
</section>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');
    const totalPriceInput = document.getElementById('total_price');

    function updateTotalPrice() {

        const selectedOption =
            productSelect.options[productSelect.selectedIndex];

        const price = selectedOption.dataset.price || 0;

        const quantity = quantityInput.value || 0;

        const total = price * quantity;

        totalPriceInput.value =
            'Rp ' + new Intl.NumberFormat('id-ID').format(total);
    }

    productSelect.addEventListener('change', updateTotalPrice);
    quantityInput.addEventListener('input', updateTotalPrice);

});
</script>