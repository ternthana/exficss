<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['name' => 'ครัว สะ ตอ รี่',
            'open_shop' => 'จ - ศ เวลา 8.00 - 17.00 น.',
            'address' => '367 ถนน บอนด์สตรีท ตำบล บ้านใหม่ อำเภอ ปากเกร็ด นนทบุรี 11120',
            'mobile' => '0614150088',
            'price' => '-',
            'facebook' => 'ครัว สะ ตอ รี่',
            'instagram' => 'Krua story',
            'img_url' => '/images/img-shop.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
