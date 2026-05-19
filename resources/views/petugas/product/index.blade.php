@extends('layouts.dashboard')
@section('title', 'Kelola Produk')

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

        <div class="relative z-10 px-4 py-8 md:px-8 md:py-10 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="w-full md:w-2/3 space-y-4">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight tracking-tight">
                    Daftar Produk<br>
                </h2>
                <p class="text-gray-200 text-sm md:text-base max-w-md leading-relaxed">
                    Manajemen dan monitoring ptoduk anda.
                </p>
            </div>

            <div class="hidden md:flex w-1/3 justify-end items-center pr-6">
                <div class="relative bg-white rounded-lg shadow-2xl w-28 h-36 border-t-[14px] border-gray-200 flex flex-col justify-center px-4 gap-3.5 transform -rotate-3">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-14 h-4 bg-gray-300 rounded-full border-[3px] border-white shadow-sm"></div>

                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-primary/20 flex items-center justify-center">
                            <i class="fa-solid fa-folder text-[10px] text-primary"></i>
                        </div>
                        <div class="h-1.5 w-10 bg-gray-300 rounded"></div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-primary/20 flex items-center justify-center">
                            <i class="fa-solid fa-folder text-[10px] text-primary"></i>
                        </div>
                        <div class="h-1.5 w-12 bg-gray-300 rounded"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-5 grid grid-cols-1 lg:grid-cols-4 gap-6">
    <div class="bg-primary border-b-5 border-secondary py-2 px-5 rounded-md shadow-md flex justify-between font-bold text-white items-center text-center gap-3 text-lg">
        <div>
            <h3>Total Stok</h3>
            <p>{{$total_stok}} Item</p>
        </div>

        <i class="fa-solid fa-box text-7xl opacity-40"></i>

    </div>

    <div class="bg-primary border-b-5 border-secondary py-2 px-5 rounded-md shadow-md flex justify-between font-bold text-white items-center text-center gap-3 text-lg">
        <div>
            <h3>Total Produk</h3>
            <p>{{$total_produk}} Item</p>
        </div>

        <i class="fa-solid fa-box text-7xl opacity-40"></i>

    </div>

    <div class="bg-primary border-b-5 border-secondary p-2 rounded-md shadow-md">
    </div>

    <div class="bg-primary border-b-5 border-secondary p-2 rounded-md shadow-md">
    </div>
</section>

<section class="p-5">
    <div class="flex justify-between p-2 items-center">
        <a href="{{route('petugas.create')}}" class="p-2 bg-primary rounded-md border-t-4 border-secondary text-white font-bold my-2 text-center shadow-md hover:bg-primary-light">
            <i class="fa-solid fa-plus"></i> Tambah Produk
        </a>
        <form action="{{ route('petugas.kelola-produk') }}" method="GET">
            @csrf
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Produk...."
            class="bg-bg shadow-md rounded-md py-2 px-2.5">
            <button type="submit"
            class="bg-primary py-2 px-2.5 rounded-md text-white hover:bg-primary-light shadow-md">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
        <div class="bg-white rounded-lg shadow-md border-t-[4px] border-primary overflow-hidden flex flex-col justify-between">

            <div>
                <div class="bg-gray-50/50 px-4 py-3 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-text text-sm md:text-base tracking-tight text-primary">
                        <i class="fa-solid fa-box mr-1.5 text-secondary"></i> 
                    </h3>
                    <span class="bg-primary text-white text-xs px-2 py-0.5 rounded-full font-semibold shrink-0">
                         {{$total_stok}} Tersedia
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 font-semibold text-xs tracking-wider uppercase">
                                <th class="py-2.5 px-4 w-12 text-center">No</th>
                                <th class="py-2.5 px-4">Kategori</th>
                                <th class="py-2.5 px-4">Nama Produk </th>
                                <th class="py-2.5 px-4">Harga</th>
                                <th class="py-2.5 px-4">Stok</th>
                                <th class="py-2.5 px-4">Unit</th>
                                <th class="py-2.5 px-4 w-20 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm text-text">
                            @forelse ($product as $index => $p)
                            <tr class="hover:bg-gray-50/40 transition">
                                <td class="py-2 px-4 text-center text-xs font-medium text-gray-400">
                                    {{ $index + 1 }}
                                </td>
                                <td class="py-2 px-4 font-bold text-text truncate max-w-[180px]">
                                    {{ $p->categorie->category_name ?? '-' }}
                                </td>
                                <td class="py-2 px-4 font-mono text-xs text-gray-500">
                                    {{ $p->product_name ?? '-' }}
                                </td>
                                <td class="py-2 px-4 font-mono text-xs text-gray-500 ">
                                    RP {{round($p->price) ?? '-' }}
                                </td>

                                <td class="py-2 px-4 font-mono text-xs text-gray-500">
                                    {{ $p->stock ?? '-' }} PCS  
                                </td>

                                <td class="py-2 px-4 font-mono text-xs text-gray-500">
                                    {{ $p->unit ?? '-' }}
                                </td>
                                <td class="py-2 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <form action="{{ route('product.destroy', $p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="p-1.5 bg-danger/20 hover:bg-danger/40 text-danger rounded transition" title="Hapus Siswa">
                                                <i class="fa-solid fa-trash text-[10px]"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('product.edit', $p->id) }}" class="p-1.5 bg-primary/10 hover:bg-primary/20 text-primary rounded transition" title="Edit Siswa">
                                            <i class="fa-solid fa-pen text-[10px]"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <section class="py-10 px-5">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i class="fa-solid fa-box text-4xl text-gray-300"></i>
                                        <span class="font-medium">Belum ada data produk yang ditambahkan.</span>
                                    </div>
                            </section>

                                {{$product->links()}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</section>
@endsection
