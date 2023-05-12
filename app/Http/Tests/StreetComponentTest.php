<?php

use Tests\TestCase;
use App\Models\Street;
use function PHPUnit\Framework\assertEquals;

uses(TestCase::class);

test('GET /api/v1/street/{street_id} 200', function () {
    /** @var Street $street*/
    $street = Street::factory()->create();
    $this->get("/api/v1/street/{$street->id}")
        ->assertStatus(200)
        ->assertJsonPath('name', $street->name);
});

test('GET /api/v1/street/{street_id} 404', function () {
    /** @var Street $street*/
    $street = Street::factory()->create();
    $street_id = $street->id+1;
    $this->get("/api/v1/street/{$street_id}")
        ->assertStatus(404);
});

test('DELETE /api/v1/street/{street_id} 200', function () {
    /** @var Street $street*/
    $street = Street::factory()->create();
    $street_id = $street->id;
    $this->delete("/api/v1/street/{$street_id}")
        ->assertStatus(200);
    $res = Street::query()->find($street_id);
    assertEquals(null, $res);
});

test('PATCH /api/v1/street/{street_id} 404', function () {
    /** @var Street $street*/
    $street = Street::factory()->create();
    $request = [
        'name' => 'mfmfmf',
    ];

    $this->patch("/api/v1/street/{$street->id}", $request)
        ->assertStatus(404)
        ->assertJsonPath('name', $request['name']);
    
    assertEquals($street->name, $request['name']);
});