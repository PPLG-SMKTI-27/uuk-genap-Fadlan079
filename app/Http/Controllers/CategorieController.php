<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $category = categorie::query()
            ->when($search, function ($query) use ($search) {
                $query->where('category_name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        
        return view('petugas.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'description' => 'nullable|string',
        ]);

        categorie::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $kategori)
    {
        return view('petugas.categories.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorie $kategori)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $kategori->id,
            'description' => 'nullable|string',
        ]);

        $kategori->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
