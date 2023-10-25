<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Applications;
use App\Models\Notification;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #通知一覧表示
        $notifications = Notification::orderBy('created_at', 'desc')->get();

        $bookmark_count = Bookmark::where('user_id', Auth::user()->id)->count();

        $entry_count = Applications::where('user_id', Auth::user()->id)->
                        count();

        $selection_count = Applications::where('user_id', Auth::user()->id)
                        ->whereBetween('status_id', [2, 7]) // status_idが2から7の間にあるデータを選択
                        ->count();

        $offer_count = Applications::where('user_id', Auth::user()->id)
                        ->where('status_id', '8') // status_idが8のデータを選択
                        ->count();

        $currentDate = Carbon::now()->locale('ja_JP')->isoFormat('LL<br>dddd');
        return view('home', ['currentDate' => $currentDate, 'bookmark_count' => $bookmark_count, 'entry_count' => $entry_count, 'selection_count' => $selection_count, 'offer_count' => $offer_count, 'notifications' => $notifications]);
    }
}
