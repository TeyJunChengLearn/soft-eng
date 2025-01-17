<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanctuary extends Model
{
    protected $table="sanctuaries";

    protected $fillable=[
        'name',
        'address',
        'manager_id',
    ];

    public function manager(){
        return $this->belongsTo(Manager::class,'manager_id','id');
    }

    public function cat(){
        return $this->hasMany(Cat::class,"sanctuary_id","id");
    }

    public function sanctuaryTask(){
        return $this->hasMany(SanctuaryTask::class,"sanctuary_id","id");
    }

    public function supplyRequest(){
        return $this->hasMany(SupplyRequest::class,"sanctuary_id","id");
    }
}
