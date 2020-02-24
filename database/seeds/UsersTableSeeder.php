<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'name' => 'Min Lu',
         'email' => 'minlu@ivhub.com',
         'password' => Hash::make('secret'),
         'role_id' => 1,
         'created_at' => now(),
         'updated_at' => now()
     ]);
     DB::table('users')->insert([
        'name' => 'Khin Khin Htoo',
        'email' => 'kkhtoo@ivhub.com',
        'password' => Hash::make('secret'),
        'role_id' => 1,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    DB::table('users')->insert([
       'name' => 'Test Author',
       'email' => 'test@ivhub.com',
       'password' => Hash::make('secret'),
       'role_id' => 1,
       'created_at' => now(),
       'updated_at' => now()
   ]);
   DB::table('users')->insert([
      'name' => 'Unknown',
      'email' => 'unknown@ivhub.com',
      'password' => Hash::make('secret'),
      'role_id' => 1,
      'created_at' => now(),
      'updated_at' => now()
  ]);
     DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@ivhub.com',
        'password' => Hash::make('secret'),
        'role_id' => 2,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    }
}
