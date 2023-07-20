<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabangPenangkaran extends Model
{
    protected $table = 'cabang_penangkarang';

    protected $primaryKey = 'id_penangkaran';

    protected $fillable = [
        'id_lobsterindo',
        'id_user',
        'lokasi_penangkaran',
        'jumlah_karyawan',
        'negara',
        'nomor_rekening',
    ];

    public $timestamps = true;

    public function lobsterindo()
    {
        return $this->belongsTo(Lobsterindo::class, 'id_lobsterindo', 'id_lobsterindo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // ...
}
