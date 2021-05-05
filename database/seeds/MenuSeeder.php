<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'menu' => 'Dashboard',
            'icon' => 'layers',
            'url' => '/dashboard/homes',
            'is_active' => '1'
        ]);
        Menu::create([
            'menu' => 'Posts',
            'icon' => 'edit',
            'url' => '/dashboard/posts',
            'is_active' => '1'
        ]);
        Menu::create([
            'menu' => 'Managements',
            'icon' => 'grid',
            'url' => '/dashboard/managements',
            'is_active' => '1'
        ]);
        Menu::create([
            'menu' => 'Users',
            'icon' => 'users',
            'url' => '/dashboard/users',
            'is_active' => '1'
        ]);
        Menu::create([
            'menu' => 'Settings',
            'icon' => 'settings',
            'url' => '/dashboard/settings',
            'is_active' => '1'
        ]);
    }
}
