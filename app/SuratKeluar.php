<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $fillable = ['id_surat','id_status'];

    public function suratKeluar()
    {
        return $this->belongsTo(Surat::class);
    }

    public function statusKeluar()
    {
        return $this->belongsTo(Status::class);
    }
}
