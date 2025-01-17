<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalStaffVerification extends Model
{
    protected $table = "medical_staff_verifications";

    protected $fillable = [
        "approval",
        "medical_staff_id",
        "manager_id",
    ];

    public function medicalStaff(){
        return $this->belongsTo(MedicalStaff::class,"medical_staff_id","id");
    }

    public function manager(){
        return $this->belongsTo(Manager::class,"manager_id","id");
    }
}
