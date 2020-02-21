<?php

use Illuminate\Database\Seeder;

class CampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Camping::class, 20)->create();
    }
}
