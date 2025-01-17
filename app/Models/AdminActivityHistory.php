<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivityHistory extends Model
{
    protected $table = "admin_activity_histories";
    protected $fillable = [
        "details",
        "datetime",
        "admin_id"
    ];

    public function admin(){
        return $this->belongsTo(Admin::class,"admin_id","id");
    }
}
