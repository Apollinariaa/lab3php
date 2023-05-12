<?php

namespace App\Actions;

use App\Models\Street;

class UpdateStreetAction
{
    public function execute(int $street_id, array $fields) : Street 
    {        
        Street::whereId($street_id)->update($fields);
        
        $obj = Street::findOrFail($street_id);

        return $obj;
    }
}
