<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    protected $table='supply_requests';

    protected $fillable=[
        "item_name",
        "quantity",
        "datetime",
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
