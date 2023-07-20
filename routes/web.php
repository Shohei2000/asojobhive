<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;//ログイン用
use App\Http\Controllers\HomeController;//ホーム画面(ダッシュボード画面)用
use App\Http\Controllers\UserController;//ユーザー情報用
use App\Http\Controllers\JobController;//企業・仕事用


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    //ログインフォーム表示
    Route::get('/', [AuthController::class,'showLogin'])->name('login.show');
    //ログイン処理
    Route::post('login', [AuthController::class,'login'])->name('login');
    //新規会員登録画面表示
    Route::get('register', [AuthController::class,'showRegister'])->name('register.show');
   // 新規登録入力確認画面表示
    Route::post('/register/check', [AuthController::class, 'registerCheck'])->name('register.check');
    // 新規登録追加処理
    Route::post('/register/add', [AuthController::class, 'registerAdd'])->name('register.add');
});


Route::middleware(['auth'])->group(function () {
    //ホーム画面(ダッシュボード)
    Route::get('home', [HomeController::class, 'index'])->name('home');

    //ログアウト機能
    Route::post('logout', 
    [AuthController::class, 'logout'])
    ->name('logout');

    //基本プロフィール画面
    Route::get('basic_profile', [UserController::class, 'showBasicProfile'])->name('users.showBasicProfile');
    //基本プロフィール編集画面
    Route::get('basic_profile/edit', [UserController::class, 'editBasicProfile'])->name('users.editBasicProfile');
    //登録情報更新処理
    Route::post('/edit', [AuthController::class, 'editCheck'])->name('edit.check');


    //求人票一覧画面
    Route::get('job_posts', [JobController::class, 'showJobPosts'])->name('job_posts.show');
    //気になるリスト画面
    Route::get('bookmarks', [UserController::class, 'showBookmarks'])->name('users.showBookmarks');
    //応募済みリスト画面
    Route::get('entries', [UserController::class, 'showEntries'])->name('users.showEntries');
    //選考中リスト画面
    Route::get('selections', [UserController::class, 'showSelections'])->name('users.showSelections');
    //内定済みリスト画面
    Route::get('offers', [UserController::class, 'showOffers'])->name('users.showOffers');


});
