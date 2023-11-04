<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Bookmark;
use App\Models\Job;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * 企業一覧表示を表示.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCompanies(Request $request)
    {
        $companies = Company::query();
    
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();
    
        if (isset($request)) {
            $keyword = $request->input('keyword');
            // キーワードが指定されている場合は検索処理を実行
            if (!empty($keyword)) {
                $companies->where('company_name', 'LIKE', '%' . $keyword . '%')
                         ->orWhere('company_name_kana', 'LIKE', '%' . $keyword . '%');
            }
        }
    
        $companies = $companies->get(); // 実際の結果を取得
    
        return view('companies.companies', compact('companies', 'bookmarks'));
    }

    // 企業詳細画面の表示
    public function showCompanyDetail(Company $company){

         // 企業に関連するjobsのデータを取得

        $jobs = Job::where('jobs.company_id', $company->id)
                    ->get();
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();
        $active = "CompanyDetail";
        
        return view('companies.company_detail', compact('company', 'jobs', 'bookmarks', 'active'));
    }

}
