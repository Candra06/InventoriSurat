<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $fillable = ['id_surat','id_status'];

    public function suratMasuk()
    {
        return $this->belongsTo(Surat::class);
    }

    public function statusMasuk()
    {
        return $this->belongsTo(Status::class);
    }
}
