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
        DB::table('users')->insert([
        	[ 'name' => 'admin',
            'password' => bcrypt('123456')],
        	[ 'name' => 'admin2',
            'password' => bcrypt('123456')]
        	]);

        DB::table('brand')->insert([
            [ 'name' => 'Apple',
            'brand_slug' => 'apple'],
            [ 'name' => 'Sam Sung',
            'brand_slug' => 'sam-sung'],
            [ 'name' => 'Sony',
            'brand_slug' => 'sony'],
            [ 'name' => 'LG',
            'brand_slug' => 'LG'],
            [ 'name' => 'Oppo',
            'brand_slug' => 'oppo'],
            [ 'name' => 'Black Berry',
            'brand_slug' => 'black-berry'],
            [ 'name' => 'Lenovo',
            'brand_slug' => 'lenovo'],
            [ 'name' => 'Xiaomi',
            'brand_slug' => 'xiaomi']
            ]);
        
        DB::table('category')->insert([
        	[ 'name' => 'Smart Phone',
            'category_slug' => 'smart-phone',
            'parent_id' => 0],
            [ 'name' => 'Android',
            'category_slug' => 'android',
            'parent_id' => 1],
            [ 'name' => 'IOS',
            'category_slug' => 'android',
            'parent_id' => 1],
            [ 'name' => 'Best Selling',
            'category_slug' => 'best-selling',
            'parent_id' => 0]
        	]);

        DB::table('product')->insert([
        	[ 'pro_name' => 'Iphone 6 32GB',
            'pro_slug' => 'iphone-6-32gb',
            'pro_price' => 11000000,
            'price_sales' => 9000000,
            'is_sales' => 1,
            'pro_img' => '2.jpg',
            'description' => 'Hang công ty mới',
            'xuat_xu' => 'trung quốc',
            'bao_hanh' => '1đổi1',
            'tinh_trang' => 'mới 100%',
            'trang_thai' => 0,
            'brand_id' => 1],

            [ 'pro_name' => 'Iphone 8 32GB',
            'pro_slug' => 'iphone-8-32gb',
            'pro_price' => 11000000,
            'price_sales' => 9000000,
            'is_sales' => 1,
            'pro_img' => '3.jpg',
            'description' => 'Hang công ty mới',
            'xuat_xu' => 'trung quốc',
            'bao_hanh' => '1đổi1',
            'tinh_trang' => 'mới 100%',
            'trang_thai' => 0,
            'brand_id' => 1],

            [ 'pro_name' => 'Samsung S8 32GB',
            'pro_slug' => 'Samsung-S8-32gb',
            'pro_price' => 11000000,
            'price_sales' => 9000000,
            'is_sales' => 1,
            'pro_img' => '4.jpg',
            'description' => 'Hang công ty mới',
            'xuat_xu' => 'trung quốc',
            'bao_hanh' => '1đổi1',
            'tinh_trang' => 'mới 100%',
            'trang_thai' => 1,
            'brand_id' => 4],

            [ 'pro_name' => 'Iphone 6 32GB',
            'pro_slug' => 'iphone-6-32gb',
            'pro_price' => 11000000,
            'price_sales' => 9000000,
            'is_sales' => 1,
            'pro_img' => '5.jpg',
            'description' => 'Hang công ty mới',
            'xuat_xu' => 'trung quốc',
            'bao_hanh' => '1đổi1',
            'tinh_trang' => 'mới 100%',
            'trang_thai' => 0,
            'brand_id' => 3],
            
            [ 'pro_name' => 'samsung s8',
            'pro_slug' => 'samsung-s8',
            'pro_price' => 13000000,
            'price_sales' => 8000000,
            'is_sales' => 0,
            'pro_img' => '6.jpg',
            'description' => 'Hang công ty mới',
            'xuat_xu' => 'trung quốc',
            'bao_hanh' => '1đổi1',
            'tinh_trang' => 'mới 100%',
            'trang_thai' => 0,
            'brand_id' => 1]
        	]);
    }
}
