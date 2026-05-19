@extends('layouts.dashboard')
@section('title', 'Home')

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
                    Toko Maju Bersama<br>
                </h2>
                <p class="text-gray-200 text-sm md:text-base max-w-md leading-relaxed">
                    Sistem pencatatan stok. Dirancang khusus untuk mempermudah petugas dalam merekap stok terkini produk.
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
@endsection