<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'enabled',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
