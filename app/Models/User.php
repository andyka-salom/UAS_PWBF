<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_telp',
        'alamat',
        'role',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_user');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->role === $role) {
                    return true;
                }
            }
        } else {
            if ($this->role === $roles) {
                return true;
            }
        }

        return false;
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_penangkaran', 'id_penangkaran');
    }
    public function CabangPenangkaran()
    {
        return $this->belongsTo(CabangPenangkaran::class, 'id_penangkaran');
    }
    /*public function cabangPenangkaran()
    {
        return $this->hasOne(CabangPenangkaran::class, 'id_user');
    }*/
}
