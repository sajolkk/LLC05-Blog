<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //  App\Models\User::insert([
       //  	 'name' => 'Sajo karmakar',
	    	 // 'email' => 'sajol@gmail.com',
	    	 // 'password' => Hash::make('123456'),
	    	 // 'user_id' => '1001',
	    	 // 'user_name' => 'SAJOLKK',
	    	 // 'image' => 'sajolkk.jpg'
       //  ]);

    	factory(App\Models\User::class, 5)->create();
    }
}
