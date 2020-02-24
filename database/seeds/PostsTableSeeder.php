<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // for($i=0;$i<50;$i++)
      // {
      //   DB::table('blog_posts')->insert([
      //       'title' => Str::random(15),
      //       'author' => Str::random(10),
      //       'content' => Str::random(100),
      //       'created_at'=>Carbon::parse('2020-01-01'),
      //       'updated_at'=>Carbon::parse('2020-01-01')
      //   ]);
      // }

      for($i=0;$i<60;$i++)
      {
        $faker = Faker::create('App\Post');
        DB::table('posts')->insert([
        	'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        	'user_id' => $faker->numberBetween($min = 1, $max = 3),
        	'content' => $faker->paragraph(),
        	'created_at' => Carbon::now(),
        	'Updated_at' => Carbon::now(),
        ]);
      }

    }
}
