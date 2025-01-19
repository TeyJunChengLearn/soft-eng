<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caretaker extends Model
{
    protected $table="caretakers";

    protected $fillable=[
        "status",
        "user_id",
        "manager_id",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function manager(){
        return $this->belongsTo(Manager::class,"manager_id","id");
    }

    public function adoption(){
        return $this->hasMany(Adoption::class,"caretaker_id","id");
    }

    public function catActivity(){
        return $this->hasMany(CatActivity::class,"caretaker_id","id");
    }

    public function supplyRequest(){
        return $this->hasMany(SupplyRequest::class,"caretaker_id","id");
    }
}
