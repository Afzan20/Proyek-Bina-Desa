<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';
    protected $primaryKey = 'aset_id';
    protected $fillable = [
        'kategori_id', 'kode_aset', 'nama_aset',
        'tgl_perolehan', 'nilai_perolehan', 'kondisi'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id', 'kategori_id');
    }

    public function lokasi()
    {
        return $this->hasMany(LokasiAset::class, 'aset_id', 'aset_id');
    }

    public function pemeliharaan()
    {
        return $this->hasMany(PemeliharaanAset::class, 'aset_id', 'aset_id');
    }

    public function mutasi()
    {
        return $this->hasMany(MutasiAset::class, 'aset_id', 'aset_id');
    }

    public function media(){
        return $this->hasMany(Media::class, 'ref_id', 'aset_id')->where('ref_table', 'aset');
    }

}
