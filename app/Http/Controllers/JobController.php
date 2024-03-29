<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Bookmark;
use App\Models\Job;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    /**
     * 求人詳細を表示.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // 企業求人詳細画面の表示
    public function showJobDetail(Company $company, Job $job){

    //     企業に関連するjobsのデータを取得
    //    $jobs = Job::where('jobs.company_id', $company->id)
    //                ->get();

        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();
        $active = "JobDetail";
        $jobs = '';

       return view('jobs.job_detail', compact('company', 'job', 'bookmarks', 'active', 'jobs'));

    }

}
