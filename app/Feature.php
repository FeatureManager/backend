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
     * The Environments that belong to the Feature.
     */
    public function environments()
    {
        return $this->belongsToMany('App\Environment');
    }

    /**
     * The Strategies that belong to the Feature.
     */
    public function strategies()
    {
        return $this->belongsToMany('App\Strategy');
    }
}
