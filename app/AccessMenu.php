<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessMenu extends Model
{
    protected $guarded = ['id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
