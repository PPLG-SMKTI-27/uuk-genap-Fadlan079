<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ([
        'category_id',
        'product_name',
        'price',
        'stock',
        'unit',
    ]);


    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

}
