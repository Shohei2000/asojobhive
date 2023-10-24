<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
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

        $currentDate = Carbon::now()->locale('ja_JP')->isoFormat('LL<br>dddd');
        return view('home', ['currentDate' => $currentDate, 'bookmark_count' => $bookmark_count, 'notifications' => $notifications]);
    }
}
