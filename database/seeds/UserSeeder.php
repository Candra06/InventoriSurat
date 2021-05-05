<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SCM',
            'email' => 'scm@mail.id',
            'password' => Hash::make('scm'),
            'role_id' => 1
        ]);
    }
}
