<?php

namespace Database\Seeders;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::query()->create([
            'id' => '1',
            'name' => 'Sayuran'

        ]);

        Categories::query()->create([
            'id' => '2',
            'name' => 'Buah-buahan'

        ]);

        Categories::query()->create([
            'id' => '3',
            'name' => 'Rempah-rempah'

        ]);

        Categories::query()->create([
            'id' => '4',
            'name' => 'Biji-bijian'

        ]);

        Categories::query()->create([
            'id' => '5',
            'name' => 'Umbi-umbian'

        ]);
    }
}
