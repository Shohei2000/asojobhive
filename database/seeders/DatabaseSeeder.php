<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status; // 必要に応じて、正しいネームスペースを使用して Status モデルをインポート
use App\Models\Classes; // 必要に応じて、正しいネームスペースを使用して Classes モデルをインポート

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'test@example.net',
            'password' => bcrypt('password'),
            'first_name' => '太郎',
            'last_name' => 'テスト',
            'first_name_furigana' => 'たろう',
            'last_name_furigana' => 'てすと',
            'birthday' => '2000-02-22',
            'gender' => '男性', // または '女性'
            'phone_number' => '090-1234-5678',
            'address' => '福岡県福岡市博多区',
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => null,
            'class_id' => '1',
        ]);

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

        $classes = [
            1 => '情報工学科',
            2 => 'ポップカルチャー',
            3 => '人工知能科',
        ];

        foreach ($classes as $id => $className) {
            Classes::factory()->create([
                'class_id' => $id, // id カラムを設定
                'class_name' => $className,
                'grade' => '4',
            ]);
        }
    }
}
