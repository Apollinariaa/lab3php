<?php

namespace App\Actions;

use App\Models\House;

class UpdateHouseAction 
{
    public function execute(int $house_id, array $fields) : House 
    {        
        House::whereId($house_id)->update($fields);

        $obj = House::findOrFail($house_id);

        return $obj;
    }
}
