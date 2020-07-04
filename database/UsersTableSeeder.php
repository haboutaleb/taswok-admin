<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole =Role::where('name','admin')->first();
        $authorRole =Role::where('name','author')->first();
        $userRole =Role::where('name','user')->first();

        //
        $admin=User::create([
            'name'=>'admin user',
            'email'=>'admin@taswok.com',
            'password'=>Hash::make('password')
        ]);
        $author=User::create([
            'name'=>'author user',
            'email'=>'author@taswok.com',
            'password'=>Hash::make('password')
        ]);
        $user=User::create([
            'name'=>'user user',
            'email'=>'user@taswok.com',
            'password'=>Hash::make('password')
        ]);
        $admin->roles()->attach('adminRole');
        $author->roles()->attach('authorRole');
        $user->roles()->attach('userRole');

    }
}
