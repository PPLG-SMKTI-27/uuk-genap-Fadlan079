@extends('layouts.dashboard')
@section('title', 'Tambah Kategori')

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
                    <span class="text-secondary">Kategori Baru</span>
                </h2>
                <p class="text-gray-200 text-xs md:text-sm max-w-md leading-relaxed">
                    Masukkan data kategori produk baru untuk manajemen inventaris.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="p-5 pt-0">
    <div class="bg-white rounded-lg shadow-md border-t-[5px] border-primary max-w-2xl mx-auto">

        <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-secondary/10 text-primary flex items-center justify-center shadow-inner">
                <i class="fa-solid fa-layer-group text-sm"></i>
            </div>
            <div>
                <h3 class="font-bold text-text text-base">Formulir Penambahan Kategori</h3>
            </div>
        </div>

        <form action="{{ route('kategori.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div class="space-y-1.5">
                <label for="category_name" class="block font-bold text-sm text-text">
                    Nama Kategori <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="category_name"
                       id="category_name"
                       value="{{ old('category_name') }}"
                       class="w-full p-2.5 rounded border @error('category_name') border-red-500 focus:ring-red-500/20 focus:border-red-500 @else border-gray-300 focus:ring-primary/20 focus:border-primary @enderror"
                       placeholder="Masukkan nama kategori produk..."
                       required>
                @error('category_name')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="description" class="block font-bold text-sm text-text">
                    Deskripsi Kategori
                </label>
                <textarea name="description"
                          id="description"
                          rows="4"
                          class="w-full p-2.5 rounded border @error('description') border-red-500 focus:ring-red-500/20 focus:border-red-500 @else border-gray-300 focus:ring-primary/20 focus:border-primary @enderror"
                          placeholder="Masukkan deskripsi singkat kategori...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('kategori.index') }}"
                   class="px-4 py-2.5 rounded border border-gray-300 bg-white hover:bg-gray-50 text-text font-semibold text-sm transition shadow-sm">
                    Batal
                </a>
                <button type="submit"
                        class="px-5 py-2.5 rounded bg-primary hover:bg-primary-light text-white font-bold text-sm transition shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk text-xs"></i> Tambah Kategori
                </button>
            </div>
        </form>

    </div>
</section>
@endsection
