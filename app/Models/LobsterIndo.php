<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LobsterIndo extends Model
{
    protected $table = 'lobsterindo';
    protected $primaryKey = 'id_lobsterindo';
    protected $fillable = ['ceo', 'id_user'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

