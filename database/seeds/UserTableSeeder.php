<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'User One';
        $user->email = 'userone@yahoo.com';
        $user->password = bcrypt('user1234');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Admin One';
        $admin->email = 'adminone@yahoo.com';
        $admin->password = bcrypt('admin1234');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
