<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\transaction_detail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $transaction = Transaction::query()
            ->when($search, function ($query) use ($search) {
                $query->where('customer_name', 'like', "%{$search}%")
                    ->orWhere('transaction_no', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('petugas.transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('petugas.transaction.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'customer_name' => 'required',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required',
        ]);

       

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        $subtotal = $product->price * $request->quantity;

        $lastTransaction = Transaction::latest()->first();

        $number = 1;

        if ($lastTransaction) {
            $lastNumber = (int) substr($lastTransaction->transaction_no, 4);
            $number = $lastNumber + 1;
        }

        $transactionNo = 'INV-' . str_pad($number, 4, '0', STR_PAD_LEFT);

        $transaction = Transaction::create([
            'transaction_no' => $transactionNo,
            'date' => $request->date,
            'customer_name' => $request->customer_name,
            'total_price' => $subtotal,
            'status' => $request->status,
        ]);

        transaction_detail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'unit_price' => $product->price,
            'subtotal' => $subtotal,
        ]);

        $product->decrement('stock', $request->quantity);

        return redirect()->route('transaction.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        $transaction->load('details.product');
        return view('petugas.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        return view('petugas.transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        $request->validate([
            'date' => 'required',
            'customer_name' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        $transaction->update([
            'date' => $request->date,
            'customer_name' => $request->customer_name,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('transaction.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')
            ->with('success', 'Data transaksi berhasil dihapus');
    }
}
