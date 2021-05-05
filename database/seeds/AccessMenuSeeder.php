<?php

use App\AccessMenu;
use Illuminate\Database\Seeder;

class AccessMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessMenu::create([
            'role_id' => 1,
            'menu_id' => 1,
        ]);
        AccessMenu::create([
            'role_id' => 1,
            'menu_id' => 3,
        ]);
        AccessMenu::create([
            'role_id' => 1,
            'menu_id' => 4,
        ]);
        AccessMenu::create([
            'role_id' => 1,
            'menu_id' => 5,
        ]);
    }
}
