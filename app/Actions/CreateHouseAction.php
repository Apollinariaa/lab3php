<?php

namespace App\Actions;

use App\Models\House;

class CreateHouseAction 
{
    public function execute(array $fields) : House
    {
        $new_house = new House($fields);

        $new_house->save();

        return $new_house;
    }
}
