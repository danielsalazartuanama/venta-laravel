<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access',
        ]);
        $user = User::create([
            'name' => 'jhony',
            'email' => 'jhonyfullreacciones@gmail.com',
            'password' => '$2y$10$iWL3BC3RzuynMqmHcVc4y.0Pbd0p7b9oR.nex3B2WjbwU/yUdMpV2',
        ]);

        $user->roles()->sync(1);
    }
}
