<?php

use App\Category;
use App\Prouduct;
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
        // $this->call(UserSeeder::class);
        factory(App\Prouduct::class,20)->create();
        factory(App\Category::class,5)->create();

        $categories = Category::all();
        Prouduct::all()->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(2)->pluck('id')->toArray(),
            );
        });
    }
}
