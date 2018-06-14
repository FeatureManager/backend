<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'sequence',
    ];

    /**
     * The Features that belong to the Strategy.
     */
    public function features()
    {
        return $this->belongsToMany('App\Feature');
    }
}
