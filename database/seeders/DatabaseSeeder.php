<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status; // 必要に応じて、正しいネームスペースを使用して Status モデルをインポート

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Company::factory()->count(10)->create();
        // \App\Models\CompanyQuestion::factory()->count(20)->create();

        // Status モデルのファクトリを使用してデフォルトのステータスデータを生成しデータベースに挿入
        $statuses = [
            1 => '連絡待ち',
            2 => '1次面接予定',
            3 => '2次面接予定',
            4 => '3次面接予定',
            5 => '1次面接結果待ち',
            6 => '2次面接結果待ち',
            7 => '3次面接結果待ち',
            8 => '内定',
        ];

        foreach ($statuses as $id => $statusName) {
            Status::factory()->create([
                'id' => $id, // id カラムを設定
                'status_name' => $statusName,
            ]);
        }
    }
}
