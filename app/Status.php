<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['title_status','jenis'];

    public function statusMasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    public function statusKeluar()
    {
        return $this->hasMany(SuratKeluar::class);
    }
}
