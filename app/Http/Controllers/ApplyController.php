<?php

namespace App\Http\Controllers;

use App\Models\Leave_application;

use Illuminate\Http\Request;

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

    public function leaveApplication(Request $request)
    {
        /**
         * 公欠申請処理を実行.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
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

        return view('apply.leave_application_complete'); ;
    }

}
