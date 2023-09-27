<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

//model
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $types = [
            'Gestionale',
            'Ecommerce',
            'Pubblico',
            'Privato',
            'Informativo',
            'Blog',
        ];

        foreach ($types as $type) {

            Type::create([
                'title' => $type
            ]);
        }
    }
}
