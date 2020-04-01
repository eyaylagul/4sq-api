<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VenueExploreTest extends TestCase
{
    public function test_explore()
    {
        $result = [
            'response' => [
                'groups' => [
                    [
                        'type' => 'Recommended Places Test',
                        'items' => [
                            [
                                'venue' => [
                                    'name' => 'Example Venue Name'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        Http::fake([
            '*' => Http::response($result, 200),
        ]);

        $response = $this->get('/api/explore');

        $response->assertStatus(200)
            ->assertJson([
                'response' => [
                    'groups' => [
                        [
                            'type' => $result['response']['groups'][0]['type'],
                            'items' => [
                                [
                                    'venue' => [
                                        'name' => $result['response']['groups'][0]['items'][0]['venue']['name']
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]);
    }
}
