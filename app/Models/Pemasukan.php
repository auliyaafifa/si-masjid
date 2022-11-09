<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $fillable = ['id', 'tanggal', 'deskripsi', 'jumlah', 'departemen_id', 'kategori_id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }

    public function kategori_pemasukan()
    {
        return $this->belongsTo(KategoriPemasukan::class, 'kategori_id');
    }
}
