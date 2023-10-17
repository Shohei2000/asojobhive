<?php

namespace App\Http\Controllers;

use App\Models\Company;

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
        $active = "UserDetail";
        return view('users.basic_profile',compact('active'));
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
}
