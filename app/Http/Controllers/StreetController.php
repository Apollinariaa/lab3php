<?php

namespace App\Http\Controllers;

use App\Actions\CreateStreetAction;
use App\Actions\UpdateStreetAction;
use App\Actions\DeleteStreetAction;
use App\Http\Requests\CreateStreetRequest;
use App\Http\Requests\UpdateStreetRequest;
use App\Http\Resources\StreetResource;
use App\Models\Street;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StreetController extends Controller
{
    public function get()
    {
        return StreetResource::collection(Street::all());
    }

    public function get_by_id(int $street_id) 
    {
        try {
            return new StreetResource(Street::query()->findOrFail($street_id));        
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404,"message" => "Street not found"], 404);
        }
    }

    public function create(CreateStreetRequest $request, CreateStreetAction $action) 
    {
        $resource = new StreetResource($action->execute($request->validated()));
        
        return $resource;
    }

    public function delete(int $street_id, DeleteStreetAction $action) 
    {
        try {
            $action->execute($street_id);
            return response()->json(["code" => 200,"message" => "Street deleted"], 200);
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "Street not found"], 404);
        }
    }


    public function update(int $street_id, UpdateStreetRequest $request, UpdateStreetAction $action)
    {
        try {
            return new StreetResource($action->execute($street_id, $request->validated()));
        } catch (ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "Street not found"], 404);
        }
    }
}
