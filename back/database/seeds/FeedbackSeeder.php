<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->delete();

        DB::table('feedbacks')->insert([
            'name' => 'Test 1',
            'email' => 'emai1@mail.ru',
            'text_user' => 'Test text 1',
            'text_admin' => 'qweadgjhakdghskdfgksdhfgkshdfg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('feedbacks')->insert([
            'name' => 'Test 2',
            'email' => 'emai2@mail.ru',
            'text_user' => 'Test text 2',
            'text_admin' => 'qweadgjhakdghskdfgksdhfgkshdfg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('feedbacks')->insert([
            'name' => 'Test 3',
            'email' => 'emai3@mail.ru',
            'text_user' => 'Test text 3',
            'text_admin' => null,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('feedbacks')->insert([
            'name' => 'Test 4',
            'email' => 'emai4@mail.ru',
            'text_user' => 'Test text 4',
            'text_admin' => 'qweqa whgAJFHGAJK HSDGFJKA HGSDFJKH AGSKJDHF ASD FAS F',
            'is_show' => true,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
