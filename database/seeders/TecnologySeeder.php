<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Tecnology;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'HTML',
            'CSS',
            'JavaScript',
            'Laravel',
            'PHP',
            'VueJs'
        ];

        foreach($array as $item){

            $tecnology = new Tecnology();

            $tecnology->name = $item;
            $tecnology->slug = Str::slug($item, '-');

            $tecnology->save();
        }
    }
}
