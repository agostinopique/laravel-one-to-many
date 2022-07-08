<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['katana', 'kodachi', 'nodachi', 'uchigatana', 'wakizashi', 'tsuba'];

        foreach($categories as $category){
            $new_category = new Category();
            $new_category->category = $category;
            $new_category->slug = Category::categorySlug($category);
            $new_category->save();
        }
    }
}
