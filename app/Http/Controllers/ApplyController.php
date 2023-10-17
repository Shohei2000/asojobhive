<?php

namespace App\Http\Controllers;

use App\Models\Leave_application;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplyController extends Controller
{
    //
    public function showleaveApplication()
    {
        /**
         * 公欠申請画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        return view('apply.leave_application');
    }

    public function leaveApplicationCheck(Request $request)
    {
        /**
         * 公欠申請確認画面を表示.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */


        //バリデーション機能
        $validator = Validator::make($request->all(),[
            'department' => 'required|string|max:255',
            'student_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
            'teacher' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        //バリデーションエラーがあった場合
        if ($validator->fails()) {
            return redirect()->route('apply.showLeaveApplication')
                ->withErrors($validator);
        }

        return view('apply.leave_application_check', compact('request'));
    }

    public function leaveApplication(Request $request)
    {
        /**
         * 公欠申請処理を実行.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        //公欠申請データを保存
        $apply = new Leave_application();
        $apply->department = $request->input('department');
        $apply->student_id = $request->input('student_id');
        $apply->name = $request->input('name');
        $apply->date = $request->input('date');
        $apply->subject = $request->input('subject');
        $apply->teacher = $request->input('teacher');
        $apply->company_name = $request->input('company_name');
        $apply->location = $request->input('location');
        $apply->content = $request->input('content');
        $apply->save();

        return view('apply.leave_application_complete', compact('apply'));
    }

}
