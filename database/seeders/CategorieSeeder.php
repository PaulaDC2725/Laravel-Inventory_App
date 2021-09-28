<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::factory(10)->create();
    }
}

