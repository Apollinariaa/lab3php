<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'street_id', 'house_type', 'active_from', 'active_to', 'number_of_floors'];

    public $timestamps = false;

    public function street()
    {
      return $this->belongsTo(Street::class);
    }
}
