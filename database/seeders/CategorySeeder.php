<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        //
        \App\Models\Category::insert([
            ['name'=>'Teknoogi',],
            ['name'=>'Politik',],
            ['name'=>'Kesehatan',],
            ['name'=>'Olahraga',],
            ['name'=>'Kuliner',],
            ['name'=>'Perwibuan',],

        ]);
    }
}
