<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Environment extends Model
{
    use SoftDeletes;
    use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'enabled'
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
