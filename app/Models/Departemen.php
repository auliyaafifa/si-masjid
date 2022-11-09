<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen';
    // protected $fillable = ['nama_departemen', 'nama_kepala_dept];
    protected $guarded = [];

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'departemen_id');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'departemen_id');
    }
}
