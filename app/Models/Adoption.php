<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table = "adoptions";

    protected $fillable = [
        "datetime",
        "cat_id",
        "caretaker_id"
    ];

    public function cat(){
        return $this->belongsTo(Cat::class, "cat_id","id");
    }

    public function caretaker(){
        return $this->belongsTo(Caretaker::class,"caretaker_id","id");
    }
}
