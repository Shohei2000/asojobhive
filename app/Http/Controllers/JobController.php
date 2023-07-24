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
    public function showJobPosts(Request $request)
    {
        $companies = Company::query();

        $keyword = $request->input('keyword');
        // キーワードが指定されている場合は検索処理を実行
        if (!empty($keyword)) {
            $companies->where('company_name', 'LIKE', '%' . $keyword . '%')
            ->orwhere('company_name_kana', 'LIKE', '%' . $keyword . '%');
        }

        $companies = $companies->get();

        return view('job_posts', compact('companies'));

    }

}
