<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanctuaryTask extends Model
{
    //

    protected $table="sanctuary_task";

    protected $fillable=[
        "datetime",
        "summary",
        "sanctuary_id",
        "caretaker_id",
    ];

    public function sanctuary(){
        return $this->belongsTo(Sanctuary::class,"sanctuary_id","id");
    }

    public function caretaker(){
        return $this->belongsTo(Caretaker::class,"caretaker_id","id");
    }
}
