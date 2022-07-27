<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket_satu extends Model
{
    use HasFactory;
    // Table Paket Satuan
    protected $fillable = [
        'kd_barang', 'nama_barang', 'ket_barang', 'harga_barang'
    ];
}
