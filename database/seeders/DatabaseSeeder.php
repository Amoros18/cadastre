<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory as Faker;
use Faker\Provider\Base;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    protected $faker;

    public function getFaker() {
        if (empty($this->faker)) {
        $faker = Faker::create();
        $faker->addProvider(new Base($faker));
        $faker->addProvider(new Lorem($faker));
        }
        return $this->faker = $faker;
    }

    
    /**
     * Seed the application's database.
    */
    public function run(): void
    {
        $this->call(NouveauDossierSeeder::class);
    }
}
