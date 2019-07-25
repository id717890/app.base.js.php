<?php

use Illuminate\Database\Seeder;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_products')->delete();

//        DB::table('user_products')->insert([
//            'id' => 1,
//            'user_id' => 2,
//            'product_id' => 1,
//            'price' => 299,
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//        ]);

//        DB::table('user_products')->insert([
//            'id' => 2,
//            'user_id' => 1,
//            'product_id' => 1,
//            'price' => 300,
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//        ]);
    }
}
