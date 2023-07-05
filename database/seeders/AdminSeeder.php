<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Admin::insert([
            [
                'name'=>'Administrator',
                'email'=>'admin69@gmail.com',
                'password'=>bcrypt('9696'),
                'created_at'=>\Carbon\Carbon::now('UTC')
            ],
        ]);
    }
}
