<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = [
        'priority','name','status','last_maintenance','machinetypes_id'
    ];
    public function machinetype()
    {
        return $this->belongsTo('App\Models\Machinetype');
    }

    public function incidents()
    {
        return $this->hasMany('App\Models\Incident');
    }
    public function maintenances()
    {
        return $this->belongsToMany('App\Models\Maintenance', 'machinesmaintenances');
    }
}