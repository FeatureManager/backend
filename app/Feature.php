<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
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
     * The Strategies that belong to the Feature.
     */
    public function strategies()
    {
        return $this->belongsToMany('App\Strategy');
    }
}
