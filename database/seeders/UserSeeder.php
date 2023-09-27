<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//model
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        for ($i=0; $i < 5; $i++) { 
            
            $user = new User();
            $user->name = fake()->userName();
            $user->email = fake()->email();
            $user->email_verified_at = fake()->dateTime();
            $user->password = 'ciao1234';
            $user->save();
        }
    }
}
