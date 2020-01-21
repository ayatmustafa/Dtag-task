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
        $add=App\User::create([
            'name'=>"ayat",
            'email'  =>"admin@gmail.com",
            'password' =>\Hash::make('123456789'),
         ]);
    }
}
