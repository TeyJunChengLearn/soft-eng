<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function feedback(){
        return $this->hasMany(Feedback::class,'user_id','id');
    }

    public function admin(){
        return $this->hasOne(Admin::class,'user_id','id');
    }

    public function manager(){
        return $this->hasOne(Manager::class,'user_id','id');
    }

    public function medicalStaff(){
        return $this->hasOne(MedicalStaff::class,'user_id','id');
    }

    public function caretaker(){
        return $this->hasOne(Caretaker::class,'user_id','id');
    }
}
