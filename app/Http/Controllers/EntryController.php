<?php

namespace App\Http\Controllers;

use App\Models\Entry;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // セッションを使用するためにインポート

class EntryController extends Controller
{
    public function showEntries()
    {
        /**
         * 応募済みリスト画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */

        $user_id = Auth::user()->id;
        $entries = Entry::join('companies', 'entries.company_id', '=', 'companies.id')
                    ->where('entries.user_id', $user_id)
                    ->select('entries.*', 'companies.company_name', 'companies.business_description')
                    ->get();

        return view('users.entries', compact('entries'));
    }

    public function store(Request $request) {

        try {
        
        // リクエストから必要なデータを取得
        $user_id = $request->input('user_id');
        $company_id = $request->input('company_id');
        $job_id = $request->input('job_id');

        // すでに登録されている場合は、何もしない
        if (Entry::where('user_id', $user_id)
            ->where('company_id', $company_id)
            ->where('job_id', $job_id)
            ->exists()) {
            Session::flash('warning', '既に応募済みです');
            return back();
        }

        // エントリを作成
        Entry::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'job_id' => $job_id,
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

      public function restore(Request $request) {

        $user_id = Auth::user()->id;
        $company_id = $request->input('company_id');
  
        // ブックマークを取得する
        $entry = Entry::where('user_id', $user_id)
        ->where('company_id', $company_id)
        ->firstOrFail();
  
        // ブックマークが存在する場合
        if ($entry) {
        // ブックマークを削除する
        $entry->delete();
        // 元のページに戻る
        return redirect()->back();
  
        }else { // ブックマークが存在しない場合
        // 何もせずに元のページに戻る
        return redirect()->back();
        }
  
      }
}
