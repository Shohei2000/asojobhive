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
    public function showCompanies()
    {

        $companies = Company::all();
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();

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
