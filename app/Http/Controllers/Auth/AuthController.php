<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    /**
     * @return View
     */ 
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest;
     $request
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email','password');
        $remember = $request->has('remember');
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('login_success', 'ログイン成功しました。');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。',
        ]);

    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();//ユーザーのセッションを削除
        $request->session()->invalidate();//全セッション削除
        $request->session()->regenerateToken();//セッション再作成
        return redirect()->route('login.show')->with('logout', 'ログアウトしました');//login.showにリダイレクトする
    }

    /**
     * 新規会員登録画面を表示.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegister()
    {
        return view('login.register');
    }

    /**
     * 新規会員登録確認
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registerCheck(Request $request)
{

    $request->session()->put('registerData', $request->all());

    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'first_name' => 'required',
        'first_name_furigana' => 'required',
        'last_name' => 'required',
        'last_name_furigana' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        'birthday' => 'required|date',
        'gender' => 'required|in:male,female',
        'class_id' => 'required',
    ]);

    if ($validator->fails()) {
        // return redirect()->route('register.show')
        //     ->withErrors(['register_error' => '入力内容に誤りがあります。',])
        //     ->withInput();
        return redirect()->route('register.show')
            ->withErrors($validator)
            ->withInput($request->session()->get('registerData'));
    }

    // 入力データがバリデーションを通過した場合の処理
    return view('login.register_check')->with([
        // バリデーションを通過した入力データを次の画面に渡す
        'data' => $request->all(),
    ]);
}

    /**
     * 新規会員登録処理
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registerAdd(Request $request)
    {

        // ユーザーの登録処理
        $user = new User;
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->first_name = $request->input('first_name');
        $user->first_name_furigana = $request->input('first_name_furigana');
        $user->last_name = $request->input('last_name');
        $user->last_name_furigana = $request->input('last_name_furigana');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->remember_token = $request->input('remember_token');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->class_id = $request->input('class_id');

        // ユーザーを保存
        $user->save();

        //セッションデータを削除
        $request->session()->forget('registerData');

        return redirect()->route('login.show')->with('register_success', '新規登録が完了しました。');

    }
    public function editCheck(Request $request)
{
    $request->session()->put('registerData', $request->all());

    // dd($request->last_name);

    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'password' => 'nullable|min:6',
        'first_name' => 'required',
        'first_name_furigana' => 'required',
        'last_name' => 'required',
        'last_name_furigana' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        'birthday' => 'required|date',
        'gender' => 'required|in:male,female',
        'class_id' => 'required',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    $user->email = $request->input('email');

    // Update the password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->first_name = $request->input('first_name');
    $user->first_name_furigana = $request->input('first_name_furigana');
    $user->last_name = $request->input('last_name');
    $user->last_name_furigana = $request->input('last_name_furigana');
    $user->phone_number = $request->input('phone_number');
    $user->address = $request->input('address');
    $user->birthday = $request->input('birthday');
    $user->gender = $request->input('gender');
    $user->class_id = $request->input('class_id');

    // Save the updated user
    $user->save();

    return redirect()->route('user.showBasicProfile')->with('register_success', '登録が完了しました。');
    }
}
