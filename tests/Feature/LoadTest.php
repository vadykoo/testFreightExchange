<?php

namespace Tests\Feature;

use App\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Load;

class LoadTest extends TestCase
{
    use RefreshDatabase;

    private $city;

    public function setUp(): void
    {
        parent::setUp();
        $city = new City();
        $city->name = 'Lviv';
        $city->lng = '24.031111';
        $city->lat = '49.842957';
        $city->slug = strtolower($city->name);
        $city->setTranslation('name', 'uk', 'Львів');
        $city->save();
        $this->city = $city;
        factory(Load::class, 1)->create();
    }

    public function test_homepage_contains_non_empty_loads_table_en()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_index()
    {
        $response = $this->get('/api/en/loads');

        $response->assertSee('name');

        $response->assertStatus(200);
    }

    public function test_api_city_info_appearing()
    {
        $response = $this->get('/api/en/loads/lviv');

        $response->assertSee($this->city->name);

        $response->assertStatus(200);
    }

    public function test_translation_to_uk()
    {
        $response = $this->get('/api/uk/loads/lviv');

        $response->assertSeeText("\u041b\u044c\u0432\u0456\u0432"); //через кодування

        $response->assertStatus(200);
    }
}
