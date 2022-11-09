<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengeluaran extends Model
{
    use HasFactory;
    protected $table = 'kategori_pengeluaran';
    // protected $fillable = ['nama_departemen', 'nama_kepala_dept];
    protected $guarded = [];

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class, 'kategori_id');
    }
}
