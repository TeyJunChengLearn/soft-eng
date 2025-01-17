<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatActivity extends Model
{
    protected $table="cat_activities";

    protected $fillable=[
        "datetime",
        "summary",
        "cat_id",
        "caretaker_id",
    ];

    public function cat(){
        return $this->belongsTo(Cat::class,"cat_id","id");
    }

    public function caretaker(){
        return $this->belongsTo(Caretaker::class,"caretaker_id","id");
    }
}
