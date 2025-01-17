<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatTreatmentRecord extends Model
{
    protected $table = "cat_treatment_records";

    protected $fillable = [
        'summary',
        'cat_health_record_id',
    ];

    public function catHealthRecord(){
        return $this->belongsTo(CatHealthRecord::class, 'cat_health_record_id',"id");
    }
}
