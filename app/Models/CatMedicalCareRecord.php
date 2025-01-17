<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatMedicalCareRecord extends Model
{
    protected $table="cat_medical_care_records";

    protected $fillable=[
        'medicine_name',
        "arrangement",
        'cat_health_record_id',
    ];

    public function catHealthRecord(){
        return $this->belongsTo(CatHealthRecord::class,"cat_health_record_id","id");
    }
}
