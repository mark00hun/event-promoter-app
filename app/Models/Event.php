<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id_event
 * @property string $name
 * @property DateTime $date
 * @property string $description
 * @property float $price
 * @property Location $location
 * @property Performer $performer
 */
class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'id_event';

    protected $guarded = [
        'id_event'
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'price' => 'float',
        'fk_id_location' => 'integer',
        'fk_id_performer' => 'integer',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'fk_id_location', 'id_location');
    }

    public function performer(): BelongsTo
    {
        return $this->belongsTo(Performer::class, 'fk_id_performer', 'id_performer');
    }
}
