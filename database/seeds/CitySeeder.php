<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->name = 'Dnipro';
        $city->lng = '34.983334';
        $city->lat = '48.450001';
        $city->slug = strtolower($city->name);
        $city->setTranslation('name', 'uk', 'Дніпро');
        $city->save();

        $city = new City();
        $city->name = 'Ternopil';
        $city->lng = '25.594767';
        $city->lat = '49.553516';
        $city->slug = strtolower($city->name);
        $city->setTranslation('name', 'uk', 'Тернопіль');
        $city->save();

        $city = new City();
        $city->name = 'Kyiv';
        $city->lng = '30.523333';
        $city->lat = '50.450001';
        $city->slug = strtolower($city->name);
        $city->setTranslation('name', 'uk', 'Київ');
        $city->save();

        $city = new City();
        $city->name = 'Uzhhorod';
        $city->lng = '22.288229';
        $city->lat = '48.621025';
        $city->slug = strtolower($city->name);
        $city->setTranslation('name', 'uk', 'Ужгород');
        $city->save();

        $city = new City();
        $city->name = 'Lviv';
        $city->lng = '24.031111';
        $city->lat = '49.842957';
        $city->slug = strtolower($city->name);
        $city->setTranslation('name', 'uk', 'Львів');
        $city->save();


    }
}
