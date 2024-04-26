<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'Events'; // Specify table name if it differs from the default

    protected $fillable = [
        'user_id',
        'name',
        'descriptions',
        'dateStart',
        'dateEnd',
        'timeStart',
        'timeEnd',
        'locations',
        'price',
    ];
    public function user(){
        return $this->belongsToMany(User::class, 'eventsusers');
    }
}

