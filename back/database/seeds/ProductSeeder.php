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
            'name_html' => 'Фитнес-программа «ДВИЖЕНИЕ» <br> с элементами FLOW',
            'price' => 2,
            'photo' => 'program1.jpg',
            'icon'=>'fa fa-paw',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Бесплатный челлендж «БУДЬ В ФОРМЕ» (2 недели)',
            'name_html' => 'Бесплатный челлендж<br>«БУДЬ В ФОРМЕ» (2 недели)',
            'price' => 0,
            'icon'=>'fa fa-dumbbell',
            'photo' => 'program2.jpg',
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
