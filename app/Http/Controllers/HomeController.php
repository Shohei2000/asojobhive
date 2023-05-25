<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentDate = Carbon::now()->locale('ja_JP')->isoFormat('LL<br>dddd');
        return view('home', ['currentDate' => $currentDate]);
    }
}
