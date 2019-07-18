<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Standart Fit',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 99,
            'photo' => 'example1.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Free Fit',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 0,
            'photo' => 'example2.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Pro Fit',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 299,
            'photo' => 'example3.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}