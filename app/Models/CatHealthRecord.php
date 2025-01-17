<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatHealthRecord extends Model
{
    protected $table="cat_health_records";

    protected $fillable=[
        "datetime",
        "summary",
        "medical_staff_id",
        "cat_id",
    ];

    public function medicalStaff(){
        return $this->belongsTo(MedicalStaff::class,"medical_staff_id","id");
    }
    public function cat(){
        return $this->belongsTo(Cat::class,"cat_id","id");
    }

    public function catMedicalCareRecord(){
        return $this->hasMany(CatMedicalCareRecord::class,"medical_health_record_id","id");
    }
    public function catTreatmentRecord(){
        return $this->hasMany(CatTreatmentRecord::class,"medical_health_record_id","id");
    }
}
