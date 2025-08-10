<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // 外部キー制約を一時的に無効化
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // categories テーブルを空にしてIDリセット
    DB::table('categories')->truncate();

    // 外部キー制約を再び有効化
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            ['name' => '仕事'],
            ['name' => '家庭'],
            ['name' => '学習'],
        ];
    DB::table('categories')->insert($categories);
    }
}
