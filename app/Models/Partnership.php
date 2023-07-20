<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $table = 'partnership';
    protected $primaryKey = 'id_partnership';
    public $incrementing = false;
    protected $fillable = [
        'id_partnership',
        'id_lobsterindo',
        'nama_perusahaan',
        'nama_pemilik',
        'tgl_kerjasama',
        'lokasi_perusahaan'
    ];

    // Relasi dengan model Lobsterindo
    public function lobsterindo()
    {
        return $this->belongsTo(Lobsterindo::class, 'id_lobsterindo');
    }
}
