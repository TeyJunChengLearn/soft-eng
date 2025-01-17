<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admins";

    protected $fillable=[
        "status",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function adminActivityHistory(){
        return $this->hasMany(AdminActivityHistory::class,"admin_id","id");
    }
}
