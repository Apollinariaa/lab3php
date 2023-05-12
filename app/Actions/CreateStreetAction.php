<?php

namespace App\Actions;

use App\Models\Street;

class CreateStreetAction
{
    public function execute(array $fields) : Street
    {
        $new_street = new Street($fields);

        $new_street->save();

        return $new_street;
    }
}
