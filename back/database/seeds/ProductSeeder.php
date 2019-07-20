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
            'name' => 'Фитнес-программа «ДВИЖЕНИЕ» с элементами FLOW',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 299,
            'photo' => 'example1.jpg',
            'icon'=>'fa fa-paw',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Бесплатный челлендж «БУДЬ В ФОРМЕ» (2 недели)',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 0,
            'icon'=>'fa fa-dumbbell',
            'photo' => 'example2.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        /* DB::table('products')->insert([
            'id' => 3,
            'name' => 'Pro Fit',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 299,
            'photo' => 'example3.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
		*/
    }
}
