<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\Category::insert([
        // 	'category_id' => '101',
        // 	'name' => 'World',
        // 	'slug' => str_slug('world')
        // ],[
        // 	'category_id' => '102',
        // 	'name' => 'Technology',
        // 	'slug' => str_slug('technology')
        // ],[
        // 	'category_id' => '103',
        // 	'name' => 'Design',
        // 	'slug' => str_slug('design')
        // ]);

        factory(App\Models\Category::class,5)->create();
    }
}
