<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Cab;
use App\Models\CarBrand;
use App\Models\Company;
use App\Models\Document;
use App\Models\Person;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        BloodType::factory()->times(5)->create();
        CarBrand::factory()->times(5)->create();
        Company::factory()->times(5)->create();
        Document::factory()->times(5)->create();
        Person::factory()->times(5)->create()->each(function ($person) {
            $person->document()->sync(
                Document::all()->random(3)
            );
        });
        Cab::factory()->times(5)->create();
        /*
            ->each(function ($person) {
            $person->document()->sync(
                Document::all()->random(3)
            );
        })
        */
        $this->call(UserSeeder::class);
    }
}
