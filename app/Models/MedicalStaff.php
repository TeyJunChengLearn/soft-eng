<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalStaff extends Model
{
    protected $table="medical_staffs";

    protected $fillable=[
        "status",
        "vet_id",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,"medical_staff_id","id");
    }

    public function catHealthRecord(){
        return $this->hasMany(CatHealthRecord::class,"medical_staff_id","id");
    }

    public function MedicalStaffVerification(){
        return  $this->hasMany(MedicalStaffVerification::class,"medical_staff_id","id");
    }
}
