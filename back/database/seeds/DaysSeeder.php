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
            'title' => 'Неделя 1. Разминка 1',
            'day' => 1,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/1qVdKhGXc2A',
            'youtube_id'=> '1qVdKhGXc2A',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'title' => 'Неделя 1. Разтяжка',
            'day' => 2,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/ioDRVdk7Tnc',
            'youtube_id'=> 'ioDRVdk7Tnc',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'title' => 'Тренировка 1',
            'day' => 3,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/hiSYnAHyEG4',
            'youtube_id'=> 'hiSYnAHyEG4',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'title' => 'Тренировка 2',
            'day' => 4,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/Btl2bT0pAYQ',
            'youtube_id'=> 'Btl2bT0pAYQ',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'title' => 'Тренировка 3',
            'day' => 5,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/xOCdOOvm0-o',
            'youtube_id'=> 'xOCdOOvm0-o',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'title' => 'Тренировка 4',
            'day' => 6,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/9JZ5OVilbcI',
            'youtube_id'=> '9JZ5OVilbcI',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'title' => 'Тренировка 5',
            'day' => 7,
            'description' => '',
            'product_id' => 2,
            'url' => 'https://youtu.be/sSjg4Ootces',
            'youtube_id'=> 'sSjg4Ootces',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

		
//		for ($i = 1; $i<8; $i++) {
//			DB::table('days')->insert([
//            'title' => 'День '.$i,
//            'day' => $i,
//            'description' => 'Здесь будет видео и описание дня №'.$i,
//            'product_id' => 2,
//            'url' => 'url1',
//            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//			]);
//		}
//
//        for ($i = 1; $i<16; $i++) {
//            DB::table('days')->insert([
//                'title' => 'День '.$i,
//                'day' => $i,
//                'description' => 'Здесь будет видео и описание дня №'.$i,
//                'product_id' => 1,
//                'url' => 'url1',
//                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
//                'updated_at' => DB::raw('CURRENT_TIMESTAMP')
//            ]);
//        }

        /*DB::table('days')->insert([
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

        DB::table('days')->insert([
            'id' => 4,
            'title' => 'День №1',
            'day' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'product_id' => 2,
            'url' => 'url3',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('days')->insert([
            'id' => 5,
            'title' => 'День №1',
            'day' => 2,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'product_id' => 2,
            'url' => 'url3',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);*/

    }
}
