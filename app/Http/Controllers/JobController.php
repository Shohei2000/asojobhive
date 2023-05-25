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
    public function showJobPosts()
    {

        $companies = Company::all();

        return view('jobs.job_posts', compact('companies'));
    }
}
