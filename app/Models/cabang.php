<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
    protected $table = 'cabang_penangkarang';
    protected $primaryKey = 'id_penangkaran';
    public $incrementing = false;
    protected $keyType = 'char';
    

    public function lobsterindo()
    {
        return $this->belongsTo(Lobsterindo::class, 'id_lobsterindo');
    }
    
 
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_cabang');
    }
    
}
