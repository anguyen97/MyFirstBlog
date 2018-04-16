<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 31;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('posts')->insert([ //,
                'title' => $faker->sentence($nbWords = 8, $variableNbWords = true),
                'content' => $faker->realText($maxNbChars = 1000, $indexSize = 3),
                'description' => $faker->realText($maxNbChars = 100, $indexSize = 1),
                'slug' => str_slug($faker->sentence($nbWords = 4, $variableNbWords = true)),
                'view'=> $faker->randomDigit,
                'category_id' => 1,
                'thumbnail'=>$faker->imageUrl(800, 600, 'sports', true, 'Faker'),
            ]);
        }
    }
}
