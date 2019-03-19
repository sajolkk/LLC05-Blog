<?php
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        // 'remember_token' => str_random(10),

        'name' => $faker->name,
    	 'email' => $faker->unique()->safeEmail,
    	 'password' => Hash::make('123456'),
<<<<<<< HEAD
    	 'user_id' => random_int(1, 1000),
    	 'user_name' => $faker->unique()->userName,
    	 'image' => $faker->imageUrl(),
    	 'remember_token' => str_random(10),
         'email_verified_at' => \Carbon\Carbon::now(),
         'email_verified' => 1,
         'email_verified_token' => '',
=======
    	 'user_id' => random_int(10, 10000),
    	 'user_name' => $faker->unique()->userName,
    	 'image' => $faker->imageUrl(),
         'remember_token' => str_random(10),
         'email_verified_at' => \Carbon\Carbon::now(),
         'email_verified' => 1,
    	 'email_verification_token' => '',
>>>>>>> 410237d996ffaee1e31a130c767ce90312165ebe
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
	$category = $faker->name;
    return [
<<<<<<< HEAD
        'category_id' => random_int(1,1000),
=======
        'category_id' => random_int(10,10000),
>>>>>>> 410237d996ffaee1e31a130c767ce90312165ebe
    	'name' => $category,
    	'slug' => str_slug($category)
    	 
    ];
});

$factory->define(App\Models\Post::class, function (Faker $faker) {
	
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->user_id;
        },
    	'category_id' => function () {
            return factory(App\Models\Category::class)->create()->category_id;
        },
    	'title' => $faker->realText(32),
    	'content' =>$faker->realText(),
    	'image' => $faker->imageUrl()
    	 
    ];
});
