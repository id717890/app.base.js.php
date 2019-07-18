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
            'name' => 'ANIMAL FLOW "Движение жизнь"',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'price' => 299,
            'photo' => 'example1.jpg',
            'icon'=>'fa fa-paw',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Бесплатный челендж "Будь в форме"',
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
