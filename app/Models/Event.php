<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'recurrence_id',
    ];
    
    /**
     * Method recurrence
     *
     * @return void
     */
    public function recurrence() 
    {
        return $this->hasOne(Recurrence::class);
    }
     
    /**
     * Method evntsRecurrence
     *
     * @return void
     */
    public function evntsRecurrence() 
    {
        return $this->hasOne(EventRecurrence::class);
    }

    
}
