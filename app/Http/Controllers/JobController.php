<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyQuestionReply;
use App\Models\CompanyQuestion;
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
    // public function showJobPosts()
    // {

    //     $companies = Company::all();
    //     $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();

    //     return view('jobs.job_posts', compact('companies', 'bookmarks'));
    // }

    // 企業詳細画面の表示
    // public function showJobPostDetail(Company $company){

    //      // 企業に関連するjobsのデータを取得

    //     $jobs = Job::where('jobs.company_id', $company->id)
    //                 ->get();
    //     return view('jobs.job_detail', compact('company', 'jobs'));
    // }

    // 企業求人詳細画面の表示
    public function showJobDetail(Company $company, Job $job){

    //     企業に関連するjobsのデータを取得
    //    $jobs = Job::where('jobs.company_id', $company->id)
    //                ->get();

        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();
        $active = "JobDetail";

       return view('jobs.job_detail', compact('company', 'job', 'bookmarks', 'active'));

    }

    /**
     * 質問画面の表示
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showQuestions($companyId)
    {
        $company = Company::findOrFail($companyId);
        $questions = $company->questions;

        if ($questions->isEmpty()) {
            abort(404, 'Questions not found');
        }

        $questionIds = $questions->pluck('id');
        $replies = CompanyQuestionReply::whereIn('company_question_id', $questionIds)->get();

        return view('jobs.questions', compact('company', 'questions', 'replies'));
    }

    /**
     * 質問投稿画面の表示
     *
     * @param int $companyId
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showQuestionForm($companyId)
    {
        $company = Company::findOrFail($companyId);

        return view('jobs.question_form', compact('company'));
    }

    /**
     * 質問の回答
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitReply(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:company_questions,id',
            'reply_content' => 'required',
        ]);

        $reply = new CompanyQuestionReply();
        $reply->company_question_id = $request->question_id;
        $reply->reply_content = $request->reply_content;
        $reply->save();

        return redirect()->back()->with('success', '返信が投稿されました。');
    }


    /**
     * 質問の保存
     *
     * @param Request $request
     * @param int $companyId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeQuestion(Request $request, $companyId)
    {
        $company = Company::findOrFail($companyId);

        $data = $request->validate([
            'question_title' => 'required',
            'question_content' => 'required',
        ]);

        try {
            $question = $company->questions()->create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('job_posts.questions', ['companyId' => $company->id])->with('success', '質問が投稿されました。');
    }

    /**
     * いらないやつかも（調査中）
     *
     * @param Request $request
     * @param int $questionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showQuestion($companyId, $questionId)
    {
        $company = Company::findOrFail($companyId);
        $question = $company->questions()->findOrFail($questionId);
        $replies = $question->replies;

        return view('jobs.question', compact('question', 'replies'));
    }
}
