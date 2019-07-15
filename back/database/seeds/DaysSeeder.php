<?php

use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->delete();

        DB::table('days')->insert([
            'id' => 1,
            'title' => 'День №1',
            'day' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'product_id' => 1,
            'url' => 'url1',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'id' => 2,
            'title' => 'День №2',
            'day' => 2,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'product_id' => 1,
            'url' => 'url2',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'id' => 3,
            'title' => 'День №3',
            'day' => 3,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'product_id' => 1,
            'url' => 'url3',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
