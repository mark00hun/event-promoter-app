<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $primaryKey = 'id_location';

    protected $guarded = [
        'id_location'
    ];

    protected $casts = [
        'date' => 'date',
        'price' => 'float',
        'fk_id_location' => 'integer',
        'fk_id_performer' => 'integer',
    ];
}
