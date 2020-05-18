<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Load;

class LoadTest extends TestCase
{

    public function test_homepage_contains_non_empty_loads_table_en()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_index()
    {
        $response = $this->get('/api/loads');

        $response->assertSee('name');

        $response->assertStatus(200);
    }

    public function test_api_city_info_apeearing()
    {
        $response = $this->get('/api/loads');

        $response->assertSee('name');

        $response->assertStatus(200);
    }

//    public function test_translation_to_uk()
//    {
//        $response = $this->get('/uk');
//
//        $response->assertSee('Біржа вантажів');
//
//        $response->assertStatus(200);
//    }
}
