<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $fillable = ['nomor_surat','asal','tujuan','perihal','tipe','file_surat'];

    public function suratMasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    public function suratKeluar()
    {
        return $this->hasMany(SuratKeluar::class);
    }
    // public function user()
    // {
    //     return $this->hasMany(User::class);
    // }
}
