<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Load;
use Faker\Generator as Faker;
use App\City;
use Illuminate\Http\File;


$factory->define(Load::class, function (Faker $faker) {

    $names_en = [
        "Boxes", "Furniture", "Products", "Animals", "Appliances", "Vegetables", "Cars", "Toys"
    ];
    $names_uk = [
        "Ящики", "Меблі", "Продукти", "Тварини", "Техніка", "Овочі", "Автомобілі", "Іграшки"
    ];

    $cities = City::query()->get();

    $name_id = $faker->randomKey($names_en);

    $image = $faker->image();
    $imageFile = new File($image);

    return [
       'name' => [
            'en' => $names_en[$name_id],
            'uk' => $names_uk[$name_id]
        ],
        'city_to_id' => $faker->randomElement($cities)->id,
        'city_from_id'=> $faker->randomElement($cities)->id,
        'volume' => $faker->randomFloat(2,0.5,15),
        'photo' => \Storage::disk('public')->putFile('images', $imageFile),
    ];
});
