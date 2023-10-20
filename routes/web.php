<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;//ログイン用
use App\Http\Controllers\HomeController;//ホーム画面(ダッシュボード画面)用
use App\Http\Controllers\UserController;//ユーザー情報用

use App\Http\Controllers\CompanyController;//企業用
use App\Http\Controllers\JobController;//求人用
use App\Http\Controllers\QuestionController;//質問用

use App\Http\Controllers\SuggestController;//オートコンプリート用
use App\Http\Controllers\BookmarkController;//ブックマーク用

use App\Http\Controllers\ApplyController;//公欠申請用
use App\Http\Controllers\CalendarController;//カレンダー用

use App\Http\Controllers\ApplicationController;//選考ステータス用


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
    Route::post('/login', [AuthController::class,'login'])->name('login');
    //新規会員登録画面表示
    Route::get('/register', [AuthController::class,'showRegister'])->name('register.show');
   // 新規登録入力確認画面表示
    Route::post('/register/check', [AuthController::class, 'registerCheck'])->name('register.check');
    // 新規登録追加処理
    Route::post('/register/add', [AuthController::class, 'registerAdd'])->name('register.add');
});

Route::get('/teacher', 'TeacherController@login')->name('teacher.login');

Route::middleware(['auth'])->group(function () {
    //ホーム画面(ダッシュボード)
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //ログアウト機能
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //基本プロフィール画面
    Route::get('/basic_profile', [UserController::class, 'showBasicProfile'])->name('user.showBasicProfile');
    //基本プロフィール編集画面
    Route::get('/basic_profile/edit', [UserController::class, 'editBasicProfile'])->name('user.editBasicProfile');
    //登録情報更新処理
    Route::post('/edit', [AuthController::class, 'editCheck'])->name('edit.check');
  
    //企業一覧画面
    Route::get('/companies', [CompanyController::class, 'showCompanies'])->name('companies.show');
    //企業詳細画面
    Route::get('/companies/{company}/detail', [CompanyController::class, 'showCompanyDetail'])->name('company.detail');

    //質問画面
    Route::get('/companies/{companyId}/questions', [QuestionController::class, 'showQuestions'])->name('company.questions');
    //質問投稿画面
    Route::get('companies/{companyId}/question_form', [QuestionController::class, 'showQuestionForm'])->name('companies.question_form');
    //質問投稿処理
    Route::post('companies/{companyId}/question_store', [QuestionController::class, 'storeQuestion'])->name('companies.store_question');
    //質問詳細画面表示
    Route::get('companies/{companyId}/questions/{questionId}', [QuestionController::class, 'showQuestion'])->name('companies.question');
    //質問詳細画面への返信処理
    Route::post('/reply_submit', [QuestionController::class, 'submitReply'])->name('companies.reply_submit');

    //求人詳細画面
    Route::get('/companies/{company}/{job}', [JobController::class, 'showJobDetail'])->name('job.detail');

    // ブックマーク追加と削除をまとめる(改善の余地あり)
    //ブックマック追加機能
    Route::post('/bookmark_store', [BookmarkController::class, 'store'])->name('bookmark.store');
    //ブックマック削除機能
    Route::post('/bookmark_restore', [BookmarkController::class, 'restore'])->name('bookmark.restore');
    
    //気になるリスト画面
    Route::get('/bookmarks', [BookmarkController::class, 'showBookmarks'])->name('user.showBookmarks');
    //応募済みリスト画面
    Route::get('/entries', [ApplicationController::class, 'showEntries'])->name('user.showEntries');
    //選考中リスト画面
    Route::get('/selections', [UserController::class, 'showSelections'])->name('user.showSelections');
    //内定済みリスト画面
    Route::get('/offers', [UserController::class, 'showOffers'])->name('user.showOffers');

    //検索サジェスト
    Route::get('/autocomplete',[SuggestController::class,'suggest']);

    //公欠申請画面
    Route::get('apply/leave_application', [ApplyController::class, 'showLeaveApplication'])->name('apply.showLeaveApplication');

    //公欠申請確認画面
    Route::post('apply/leave_application_check', [ApplyController::class, 'leaveApplicationCheck'])->name('apply.leaveApplicationCheck');

    //公欠申請処理
    Route::post('apply/leave_application_complete', [ApplyController::class, 'leaveApplication'])->name('apply.leaveApplication');

    //カレンダーのデータ取得
    Route::get('get_events', [CalendarController::class, 'getEvents'])->name('getEvents');

    // 応募機能
    Route::post('/entry', [ApplicationController::class, 'storeEntry'])->name('entry.storeEntry');

    // ステータス更新機能
    Route::post('/entry/update_status', [ApplicationController::class, 'updateStatus'])->name('entry.updateStatus');
});
