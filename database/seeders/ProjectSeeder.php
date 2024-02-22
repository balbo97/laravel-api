<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 25; $i++) {
            $new_project = new Project(); 

            $new_project->title = $faker->sentence;
            $new_project->autore = $faker->name;
            $new_project->content = $faker->paragraph;
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->cover_image = $faker->imageUrl();
            $new_project->inizio_progetto = $faker->date;
            $new_project->fine_progetto = $faker->date;

            $new_project->save();
        }
    }
}
