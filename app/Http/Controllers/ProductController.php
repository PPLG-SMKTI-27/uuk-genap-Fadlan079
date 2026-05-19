<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $product = Product::query()
            ->with('categorie') 
            ->when($search, function ($query) use ($search) {
                $query->where('product_name', 'like', "%$search%")
                    ->orWhereHas('categorie', function ($q) use ($search) {
                        $q->where('category_name', 'like', "%$search%");
                    });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $total_stok = product::sum('stock');
        $total_produk = product::count('product_name');
        
        return view('petugas.product.index', compact('product', 'total_stok','total_produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categorie::all();

        return view('petugas.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'unit' => 'required',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'unit' => $request->unit,
        ]);

        return redirect()->route('petugas.kelola-produk')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $categories = categorie::all();

        return view('petugas.product.edit', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'unit' => 'required',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'unit' => $request->unit,
        ]);

        return redirect()->route('petugas.kelola-produk')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->route('petugas.kelola-produk')
            ->with('success', 'Data produk berhasil dihapus');
    }
}
