<?php

namespace App\Actions;

use App\Models\Street;

class DeleteStreetAction 
{
    public function execute(int $street_id) 
    {
        $temp = Street::query()->findOrFail($street_id);
        $temp->delete();
    }
}
