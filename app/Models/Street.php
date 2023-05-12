<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;
    
    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'city', 'km'];

    public $timestamps = false;

    public function houses()
    {
      return $this->hasMany(House::class);
    }
}
