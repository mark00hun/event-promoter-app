<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_performer
 * @property string $name
 */
class Performer extends Model
{
    use HasFactory;

    protected $table = 'performers';
    protected $primaryKey = 'id_performer';

    protected $guarded = [
        'id_performer'
    ];
}
