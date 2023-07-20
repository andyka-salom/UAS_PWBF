<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock_barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'berat',
        'satuan',
        'harga',
        'foto_barang',
    ];
}
