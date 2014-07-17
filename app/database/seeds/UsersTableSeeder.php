<?php

class UsersTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(  
            'username' =>'admin',
            'password' => Hash::make('hunter2'), 
            'is_admin' => true
        ));

        User::create(array(
            'username' =>'scott', 
            'password' => Hash::make('tiger'),
            'is_admin' => false
        ));
} }