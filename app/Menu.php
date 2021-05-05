<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public function submenu()
    {
        return $this->hasMany(Submenu::class);
    }

    public function access()
    {
        return $this->hasMany(AccessMenu::class);
    }
}
