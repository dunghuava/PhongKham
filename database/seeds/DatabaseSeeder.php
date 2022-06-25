<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Van Dung',
            'username'=>'dunghuava',
            'email'=>'dunghuava@gmail.com',
            'password'=>bcrypt(123456)
        ]);
    }
}
