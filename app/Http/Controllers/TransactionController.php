<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

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
                $query->where('customer_name', 'like', "%$search%");
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
        $status = Transaction::pluck('status');
        return view('petugas.transaction.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'customer_name' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        $lastTransaction = Transaction::latest()->first();

        $number = 1;

        if ($lastTransaction) {

            $lastNumber = (int) substr($lastTransaction->transaction_no, 4);

            $number = $lastNumber + 1;
        }

        $transactionNo = 'TRX-' . str_pad($number, 4, '0', STR_PAD_LEFT);

        Transaction::create([
            'transaction_no' => $transactionNo,
            'date' => $request->date,
            'customer_name' => $request->customer_name,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('petugas.kelola-transaksi')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        //
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
            'transaction_no' => 'required',
            'date' => 'required',
            'customer_name' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        $transaction->update([
            'transaction_no' => $request->transaction_no,
            'date' => $request->date,
            'customer_name' => $request->customer_name,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('petugas.kelola-transaksi')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('petugas.kelola-transaksi')
            ->with('success', 'Data transaksi berhasil dihapus');
    }
}
