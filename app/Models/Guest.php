<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    protected $fillable = ['name', 'birthdate', 'address', 'contact_no'];
    
    protected function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
