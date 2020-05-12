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

//
//        $names_en = [
//            "Boxes", "Furniture", "Products", "Animals", "Appliances", "Vegetables", "Cars", "Toys"
//        ];
//        $names_uk = [
//            "Ящики", "Меблі", "Продукти", "Тварини", "Техніка", "Овочі", "Автомобілі", "Іграшки"
//        ];
//
//        $faker = Faker\Factory::create();
//
//
//        $cities = City::query()->get();
//
//        for ($i = 1; $i <= 10; $i++) {
//
//            $name_id = $faker->randomKey($names_en);
//
//            $image = $faker->image();
//            $imageFile = new File($image);
//
//            $load = new Load();
//            $load->name =  $names_en[$name_id];
//            $load->city_to_id = $faker->randomElement($cities)->id;
//            $load->city_from_id = $faker->randomElement($cities)->id;
//            $load->volume = $faker->randomFloat(2,0.5,15);
//            $load->photo = \Storage::disk('public')->putFile('images', $imageFile);
//            $load->setTranslation('name', 'uk', $names_uk[$name_id]);
//            $load->save();
//        }

        factory(App\Load::class, 1)->create();

    }
}
