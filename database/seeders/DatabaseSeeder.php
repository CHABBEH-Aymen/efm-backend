<?php

namespace Database\Seeders;

use App\Models\User;
use Modules\pkgProduit\Models\Produit;
use Modules\pkgProduit\Models\Rules;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        foreach (range(1, 10) as $i) {
            Produit::create([
                'nom' => 'Produit ' . $i,
                'prix' => rand(10, 100),
                'stock' => rand(0, 100),
            ]);
        }
        foreach(range(1, 5) as $i) {
            Rules::create([
                'lable' => 'Rule ' . $i,
                'expression' => 'stock > '.$i.'0 && prix < 5'.$i,
            ]);
        }
    }
}
