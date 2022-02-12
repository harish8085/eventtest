<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRecurrence extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'recurrence_id',
        'repeat_on',
        'skip_day',
        'repeat_index',
        'repeat_day',
        'repeat_criteria',
    ];

    /**
     * Method event
     *
     * @return void
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
        
    /**
     * Method recurrence
     *
     * @return void
     */
    public function recurrence()
    {
        return $this->belongsTo(Recurrence::class);
    }
}
