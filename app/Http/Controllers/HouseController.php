<?php

namespace App\Http\Controllers;

use App\Actions\CreateHouseAction;
use App\Actions\DeleteHouseAction;
use App\Actions\UpdateHouseAction;
use App\Http\Requests\CreateHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HouseController extends Controller
{
    public function get()
    {
        return HouseResource::collection(House::all());
    }

    public function get_by_id(int $house_id) 
    {
        try {
            return new HouseResource(House::query()->findOrFail($house_id)); 
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404,"message" => "House not found"], 404);
        }
    }

    public function create(CreateHouseRequest $request, CreateHouseAction $action) 
    {
        $resource = new HouseResource($action->execute($request->validated()));

        return $resource;
    }

    public function delete(int $house_id, DeleteHouseAction $action) 
    {
        try {
            $action->execute($house_id);
            return response()->json(["code" => 200,"message" => "House deleted"], 200);
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "House not found"], 404);
        }
    }

    public function update(int $house_id, UpdateHouseRequest $request, UpdateHouseAction $action) 
    {
        try {
            return new HouseResource($action->execute($house_id, $request->validated()));
        } catch (ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "House not found"], 404);
        }
    }
}
