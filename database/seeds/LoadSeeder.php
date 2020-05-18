<?php

use Illuminate\Database\Seeder;
use App\City;
use App\Load;
use Illuminate\Http\File;

class LoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Load::class, 10)->create();

    }
}
