<?php

namespace App\Http\Controllers;

use App\Models\Leave_Application;

use Illuminate\Http\Request;

class CalendarController extends Controller
{

    //公欠テーブル(leave_application)からデータを取得
    public function getEvents()
    {
        $query = Leave_Application::query(); // すべてのレコードを取得

        $leaveApplications = $query->get();

        $data = [];
        foreach ($leaveApplications as $application) {
            $description = $application->student_id.' '.$application->department.'<br>'.
                            $application->name.'<br>'.
                            $application->subject.' '.$application->teacher.'<br>'.
                            $application->company_name.'<br>'.
                            $application->location;

            $data[] = [
                'title' => $application->content,
                'description' => $description,
                'start' => $application->start_date, // 開始日
                'end' => $application->end_date, // 終了日
                'color' => '#1e90ff', //色
            ];
        }

        return response()->json($data);

    }

}