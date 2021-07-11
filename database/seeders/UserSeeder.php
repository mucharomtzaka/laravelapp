<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $superadmin =  User::create([
            'email' => 'mucharomtzaka@yahoo.co.id',
            'name' => 'Super Administrator',
            'password' => \Hash::make('12345678'),
            'status' => 'aktif',
            'type_account'=>'Personal'
        ]);
      
       $superadmin->assignRole('super-admin');
       
      $admin = User::create([
            'email' => 'mucharomtzaka@ymail.com',
            'name' => 'Administrator',
            'password' => \Hash::make('12345678'),
            'status' => 'aktif',
            'type_account'=>'Bussines'
        ]);
        
       $admin->assignRole('admin');
      
       $user = User::create([
            'email' => 'mucharomtzaka@gmail.com',
            'name' => 'User',
            'password' => \Hash::make('12345678'),
            'status' => 'aktif',
            'type_account'=>'Bussines'
        ]);
        
       $user->assignRole('user');
       
       $user1 = User::create([
            'email' => 'mucharomtzaka@hotmail.com',
            'name' => 'User1',
            'password' => \Hash::make('12345678'),
            'status' => 'aktif',
            'type_account'=>'Bussines'
        ]);
        
       $user1->assignRole('user');
       
       $user2 = User::create([
            'email' => 'mucharomtzaka@yahoo.com',
            'name' => 'User2',
            'password' => \Hash::make('12345678'),
            'status' => 'aktif',
            'type_account'=>'Bussines'
        ]);
        
       $user2->assignRole('visitor');
       
       
      $user3 = User::create([
            'email' => 'mucharomtzaka@programmer.net',
            'name' => 'User 3',
            'password' => \Hash::make('12345678'),
            'status' => 'aktif',
            'type_account'=>'Bussines'
        ]);
        
       $user3->assignRole('user');
      
    }
}
