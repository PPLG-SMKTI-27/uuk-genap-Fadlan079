<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ([
        'category_name',
        'description',
    ]);

    public function product()
    {
        return $this->hasMany(products::class);
    }
}
