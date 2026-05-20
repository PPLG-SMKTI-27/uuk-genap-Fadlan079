<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = ([
        'transaction_no',
        'date',
        'customer_name',
        'total_price',
        'status',
    ]);

    public function details()
    {
        return $this->hasMany(transaction_detail::class);
    }
}
