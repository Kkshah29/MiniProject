<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::where('email', 'svk@gmail.com')->get()->first();
        if(!$user) {
            \App\User::create([
                'name' => 'svk',
                'email' => 'svk@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('abcd1234'),
                'role'=>'admin'
            ]);
        }else {
            $user->update(['role'=>'admin']);
        }
        \App\User::create([
            'name' => 'shubh',
            'email' => 'shubh@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('abcd1234')
        ]);
        \App\User::create([
            'name' => 'jay',
            'email' => 'jay@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('abcd1234')
        ]);
        

    }
}
