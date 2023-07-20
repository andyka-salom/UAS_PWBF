<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockBarang extends Model
{
    protected $table = 'stock_barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_penangkaran',
        'id_user',
        'nama_barang',
        'jumlah_barang',
        'berat',
        'satuan',
        'harga',
        'foto_barang',
        'id_penangkaran',
    ];

    public $timestamps = true;

    public function cabangPenangkaran()
    {
        return $this->belongsTo(CabangPenangkaran::class, 'id_penangkaran', 'id_penangkaran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function cabang()
    {
        return $this->belongsTo(CabangPenangkaran::class, 'id_penangkaran', 'id_penangkaran');
    }
    public function penangkaran()
    {
        return $this->belongsTo(CabangPenangkarang::class, 'id_penangkaran');
    }
    
}
