<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_user',
        'id_barang',
        'id_pembayaran',
        'tgl_pemesanan',
        'tgl_pengiriman',
        'jumlah_pemesanan',
        'total_pembayaran',
        'alamat_pengiriman',
        'deskripsi_pemesanan',
        'status_penerimaan',
        'status_pengiriman',
        'status_disiapkan',
        'bukti_transfer',
        'nomor_rekening',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(StockBarang::class, 'id_barang', 'id_barang');
    }

    public function pembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_pembayaran');
    }
  
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang');
    }

    public function stockBarang()
    {
        return $this->belongsTo(StockBarang::class, 'id_barang');
    }
}
