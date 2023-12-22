<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i<5; $i++) {
            DB::table('users')->insert([
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'person_id' => $i + 1
            ]);
        }
    }
}
