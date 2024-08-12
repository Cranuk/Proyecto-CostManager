<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_seed extends Seeder
{
    // TODO: creamos datos default para categorias
    public function run(): void
    {
        for ($i=1; $i <= 5; $i++) { 
            DB::table('categories')->insert([
                'title' => 'categoryDefault'.$i,
                'description' => 'descriptionDefault'
            ]);
        }

        $this->command->info('Carga de datos default(Categories) completado');
    }
}
