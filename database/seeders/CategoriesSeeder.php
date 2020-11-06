<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::query()->create(
            ['title' => 'linguagem de programação']
        );

        Categories::query()->create(
            ['title' => 'Sobremesas']
        );

        Categories::query()->create(
            ['title' => 'Teste de categoria']
        );

        Categories::query()->create(
            ['title' => 'Teste de categoria 2']
        );
    }
}
