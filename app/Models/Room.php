<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $tables = 'rooms';

    protected $fillable = ['name', 'availability'];

    protected function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    protected function staffs()
    {
        return $this->hasMany(Staff::class);
    }
}
