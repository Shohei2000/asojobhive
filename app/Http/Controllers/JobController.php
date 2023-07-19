<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * 企業一覧表示を表示.
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

        // 6件ずつ表示

        return view('jobs.job_posts', compact('companies'));
    }
}
