<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


//Model
use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        Storage::deleteDirectory('uploads');
        Storage::makeDirectory('uploads');


        for ($i=0; $i < 20; $i++) { 
            
            $project = new Project();
            $project->title = fake()->word();
            $project->slug = str()->slug($project->title);
            $project->creation_date = fake()->date();
            $project->url = fake()->url();
            $project->thumb = fake()->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg');
            $project->description = fake()->text();
            $project->type_id = Type::inRandomOrder()->first()->id;
            $project->is_online = fake()->boolean();

            $project->save();
        }
    }
}
