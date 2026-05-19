<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categorie::create([
            'category_name' => 'Kebersihan',
            'description' => 'Kategori untuk produk kebersihan seperti sabun dan shampoo.',
        ]);

        categorie::create([
            'category_name' => 'ATK',
            'description' => 'Kategori untuk produk alat tulis dan kebutuhan kantor.',
        ]);


        categorie::create([
            'category_name' => 'Bahan dapur',
            'description' => 'Kategori untuk produk bahan makanan.',
        ]);

        categorie::create([
            'category_name' => 'Makanan',
            'description' => 'Kategori untuk produk makanan seperti camilan atau makanan siap santap.',
        ]);

        categorie::create([
            'category_name' => 'Minuman',
            'description' => 'Kategori untuk produk minuman siap santap.',
        ]);
    }
}
