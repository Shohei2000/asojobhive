<?php

namespace App\Http\Controllers;

use App\Models\Applications;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // セッションを使用するためにインポート

class ApplicationController extends Controller
{
    
    public function showEntries()
    {
        /**
         * 応募済みリスト画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */

        $user_id = Auth::user()->id;
        $entries = Applications::join('companies', 'applications.company_id', '=', 'companies.id')
                    ->join('jobs', 'applications.job_id', '=', 'jobs.id')
                    ->where('applications.user_id', $user_id)
                    ->select('applications.*', 'companies.company_name', 'companies.business_description', 'jobs.job_title')
                    ->with('status') // status リレーションをロード
                    ->get();

        return view('users.entries', compact('entries'));
    }

    public function storeEntry(Request $request) {
        try {
            // リクエストから必要なデータを取得
            $user_id = $request->input('user_id');
            $company_id = $request->input('company_id');
            $job_id = $request->input('job_id');

            // すでに登録されている場合は、何もしない
            if (Applications::where('user_id', $user_id)
                ->where('company_id', $company_id)
                ->where('job_id', $job_id)
                ->exists()) {
                Session::flash('warning', '既に応募済みです');
                return back();
            }

            // エントリを作成
            Applications::create([
                'user_id' => $user_id,
                'company_id' => $company_id,
                'job_id' => $job_id,
                'status_id' => "1",
            ]);

            // エントリの作成が成功した場合の処理
            Session::flash('success', '登録が完了しました');

            // 前のページに戻る
            return back();

        } catch (QueryException $e) {
            // エラーメッセージを取得
            $errorMessage = $e->getMessage();

            // エラーメッセージに基づいてユーザーに表示するメッセージを設定
            if (str_contains($errorMessage, 'entries_user_id_company_id_job_id_unique')) {
                // ユニーク制約違反の場合
                $errorMessage = 'すでに登録されています。';
            } else {
                // その他のエラーの場合
                $errorMessage = 'エラーが発生しました。';
            }

            // エラーメッセージをセッションに保存
            Session::flash('error', $errorMessage);

            // エラーメッセージを表示し、前のページに戻る
            return back();
        }
  
    }

    public function updateStatus(Request $request) {
        try {
            // リクエストから必要なデータを取得
            $user_id = $request->input('user_id');
            $company_id = $request->input('company_id');
            $job_id = $request->input('job_id');
            $newStatusId = $request->input('status');

            // 1. データを検索
            $entry = Applications::where('user_id', $user_id)
                ->where('company_id', $company_id)
                ->where('job_id', $job_id)
                ->first();

            if (!$entry) {
                return response()->json(['message' => '該当のデータが見つかりません'], 404);
            }

            // 2. 新しいステータスIDを設定
            $entry->status_id = $newStatusId;

            // 3. データベースを更新
            $entry->save();

            // 更新が成功した場合の処理
            Session::flash('success', 'ステータスを更新しました');

            // 前のページに戻る
            return back();

        } catch (QueryException $e) {
            // エラーメッセージを取得
            $errorMessage = $e->getMessage();
        }
    }
}
