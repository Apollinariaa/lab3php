<?php

namespace App\Actions;

use App\Models\House;

class DeleteHouseAction 
{
    public function execute(int $house_id) 
    {
        $temp = House::query()->findOrFail($house_id);
        $temp->delete();
    }
}
