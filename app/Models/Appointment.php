<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "appointments";

    protected $fillable = [
        "datetime",
        "cat_id",
        "medical_staff_id",
    ];

    public function cat(){
        return $this->belongsTo(Cat::class, "cat_id","id");
    }

    public function medicalStaff(){
        return $this->belongsTo(MedicalStaff::class,"medical_staff_id","id");
    }
}
