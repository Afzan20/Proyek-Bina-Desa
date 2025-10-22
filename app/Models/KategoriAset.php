<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAset extends Model
{
    use HasFactory;

    protected $table = 'kategori_aset';
    protected $primaryKey = 'kategori_id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'kode',
        'deskripsi',
    ];

    public function aset()
    {
        return $this->hasMany(Aset::class, 'kategori_id', 'kategori_id');
    }
}
