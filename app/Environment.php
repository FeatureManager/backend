<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The Features that belong to the Environment.
     */
    public function features()
    {
        return $this->belongsToMany('App\Feature');
    }

    /**
     * The Paramaters that belong to the Environment.
     */
    public function parameters()
    {
        return $this->belongsToMany('App\Parameter');
    }
}
