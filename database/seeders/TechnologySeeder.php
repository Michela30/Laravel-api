<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


//model
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $technology = [
            'Html',
            'Css',
            'Bootstrap',
            'Js',
            'Vue js',
            'Vite',
            'PHP',
            'Lavarel',
        ];

        foreach ($technology as $singleTec) {

            Technology::create([
                'title' => $singleTec
            ]);
        }
        
    }
}
