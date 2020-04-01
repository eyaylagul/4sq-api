<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VenueCategoryTest extends TestCase
{
    public function test_categories()
    {
        $result = [
            'response' => [
                'categories' => [
                    [
                        "id" => "4d4b7104d754a06370d81259",
                        "name" => "Sanat & Eğlence",
                        "categories" => [
                            [
                                "id" => "56aa371be4b08b9a8d5734db",
                                "name" => "Amfiteatr",
                                "categories" => []
                            ]
                        ]
                    ]
                ]
            ]
        ];

        Http::fake([
            '*' => Http::response($result, 200),
        ]);

        $response = $this->get('/api/categories');

        $response->assertStatus(200)
            ->assertJson([
                'response' => [
                    'categories' => [
                        [
                            'id' => $result['response']['categories'][0]['id']
                        ]
                    ]
                ]
            ]);
    }
}
