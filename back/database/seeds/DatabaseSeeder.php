<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
//         $this->call(ProductSeeder::class);
//         $this->call(DaysSeeder::class);
//         $this->call(UserProductSeeder::class);
         $this->call(FeedbackSeeder::class);
    }
}
