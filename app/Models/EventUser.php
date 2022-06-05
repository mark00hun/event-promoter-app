<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $table = 'event_users';
    protected $primaryKey = 'id_event_user';

    protected $guarded = [
        'id_event_user'
    ];
}
