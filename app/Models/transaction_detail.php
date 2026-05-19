<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    protected $fillable = ([
        'transaction_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ]);

    public function product()
    {
        return $this->belongsTo(product::class);
    }


    public function transaction()
    {
        return $this->belongsTo(transaction::class);
    }
}
