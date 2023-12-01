<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Leave_application;
use App\Models\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showBasicProfile()
    {
        /**
         * ベーシックプロファイル画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        //class_idからclass_nameを取得
        $class_name = Classes::where('class_id', Auth::user()->class_id)->first()->class_name;
        $active = "UserDetail";
        return view('users.basic_profile',compact('active','class_name'));
    }

    public function editBasicProfile()
    {
        /**
         * ベーシックプロファイル編集画面を表示。
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        return view('users.edit_basic_profile');
    }

    public function showEntries()
    {
        /**
         * 気になるリスト画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        return view('users.entries');
    }

    public function showSelections()
    {
        /**
         * 選考中リスト画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        return view('users.selections');
    }

    public function showOffers()
    {
        /**
         * 内定済みリスト画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        return view('users.offers');
    }

    public function showApplyLog(Leave_application $apply)
    {
        // 公欠申請履歴画面を表示.

        $name = (Auth::user()->last_name ." ". Auth::user()->first_name);
        $leave_applications = Leave_application::where('name', $name)->get();
        $active = "ApplyLog";

        return view('users.apply_log',compact('active','leave_applications'));
    }

    public function showApplyLogDetail(Leave_application $apply)
    {

        // 公欠申請履歴詳細画面を表示.
        $leave_application = Leave_application::where('id', $apply->id)->first();

        $active = "ApplyLog";

        return view('users.apply_log_detail',compact('active','leave_application'));
    }

    public function deleteApplyLog(Request $request)
    {
        // 公欠申請履歴削除処理
        $leave_application = Leave_application::where('id', $request->id)->first();
        $leave_application->delete();

        //削除されましたアラートを表示
        session()->flash('flash_message', '削除されました');

        return redirect()->route('user.applyLog');
    }
}
