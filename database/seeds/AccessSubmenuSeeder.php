<?php

use App\AccessSubmenu;
use Illuminate\Database\Seeder;

class AccessSubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 2,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 3,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 4,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 5,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 6,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 7,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 8,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 9,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 10,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
        AccessSubmenu::create([
            'role_id' => 1,
            'submenu_id' => 11,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
        ]);
    }
}
