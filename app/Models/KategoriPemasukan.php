<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPemasukan extends Model
{
    use HasFactory;
    protected $table = 'kategori_pemasukan';
    // protected $fillable = [''];
    protected $guarded = [];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'kategori_id');
    }
}
