<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table="managers";

    protected $fillable=[
        "status",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function medicalStaffVerification(){
        return $this->hasMany(MedicalStaffVerification::class,"manager_id","id");
    }

    public function sanctuary(){
        return $this->hasMany(Sanctuary::class,"manager_id","id");
    }
}
