<?php

use Illuminate\Database\Seeder;
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
        $user 			 		= new User;
        $user->name  		= 'Marcos Evaldt';
        $user->email 		= 'marcosevaldt@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

        $user 			 		= new User;
        $user->name  		= '4all';
        $user->email 		= '4all@example.com';
        $user->password = bcrypt('secret');
        $user->save();
    }
}
