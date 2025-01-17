<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table ="cats";

    protected $fillable =[
        'name',
        "gender",
        "breed",
        "birthdate",
        "general_story",
        "sanctuary_id",
    ];

    public function sanctuary(){
        return $this->belongsTo(Sanctuary::class,"sanctuary_id","id");
    }

    public function adoption(){
        return $this->hasOne(Adoption::class,"cat_id","id");
    }

    public function appointment(){
        return $this->hasMany(Appointment::class,"cat_id","id");
    }

    public function catActivity(){
        return $this->hasMany(CatActivity::class,"cat_id","id");
    }

    public function catHealthRecord(){
        return $this->hasMany(CatHealthRecord::class,"cat_id","id");
    }
}
