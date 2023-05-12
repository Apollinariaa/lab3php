<?php

use Tests\TestCase;
use App\Models\House;
use function PHPUnit\Framework\assertEquals;

uses(TestCase::class);

test('GET /api/v1/house/{house_id} 200', function () {
    /** @var House $house*/
    $house = House::factory()->create();
    $this->get("/api/v1/house/{$house->id}")
        ->assertStatus(200)
        ->assertJsonPath('name', $house->name);
});

test('GET /api/v1/house/{house_id} 404', function () {
    /** @var House $house*/
    $house = House::factory()->create();
    $house_id = $house->id+1;
    $this->get("/api/v1/house/{$house_id}")
        ->assertStatus(404);
});

test('DELETE /api/v1/house/{house_id} 200', function () {
    /** @var House $house*/
    $house = House::factory()->create();
    $house_id = $house->id;
    $this->delete("/api/v1/house/{$house_id}")
        ->assertStatus(200);
    $res = House::query()->find($house_id);
    assertEquals(null, $res);
});

test('PATCH /api/v1/house/{house_id} 404', function () {
    /** @var House $house*/
    $house = House::factory()->create();
    $request = [
        'name' => 'mfmfmf',
    ];

    $this->patch("/api/v1/house/{$house->id}", $request)
        ->assertStatus(404)
       ->assertJsonPath('name', $request['name']);
    
    assertEquals($house->name, $request['name']);
});
