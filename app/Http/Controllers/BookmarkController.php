<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{

    public function showBookmarks()
    {
        /**
         * 気になるリスト画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        // select * from bookmarks INNER JOIN companies ON bookmarks.company_id = companies.id 
        // where bookmarks.user_id = '1';
        $bookmarks = Bookmark::join('companies', 'bookmarks.company_id', '=', 'companies.id')
                    ->where('bookmarks.user_id', '1')
                    ->get();

        return view('users.bookmarks', compact('bookmarks'));
    }

    public function store(Request $request) {

      try {
        $bookmark = new Bookmark();
        $bookmark->user_id = Auth::user()->id;
        $bookmark->company_id = $request->input('company_id');

        // すでに登録されている場合は、何もしない
        if (Bookmark::where('user_id', $bookmark->user_id)
            ->where('company_id', $bookmark->company_id)
            ->exists()) {
            return back();
        }

        $bookmark->save();
        return redirect()->back();

      } catch (QueryException $e) {
          // エラーが発生した場合は、エラーメッセージを表示して、元のページに戻る
          return back()->withErrors('すでに登録されています。');
      }

    }

    public function restore(Request $request) {

      $user_id = Auth::user()->id;
      $company_id = $request->input('company_id');

      // ブックマークを取得する
      $bookmark = Bookmark::where('user_id', $user_id)
      ->where('company_id', $company_id)
      ->firstOrFail();

      // ブックマークが存在する場合
      if ($bookmark) {
      // ブックマークを削除する
      $bookmark->delete();
      // 元のページに戻る
      return redirect()->back();

      }else { // ブックマークが存在しない場合
      // 何もせずに元のページに戻る
      return redirect()->back();
      }

    }

}
