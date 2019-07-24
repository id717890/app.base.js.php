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
        DB::table('users')->delete();

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Ййй',
            'email' => 'jusupovz@gmail.com',
            'role' => 'admin',
            'is_verified' => true,
            'password' => Hash::make('qweqwe'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'йцу',
            'email' => 'kakashka87@list.ru',
            'role' => 'user',
            'is_verified' => true,
            'password' => Hash::make('qweqwe'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
