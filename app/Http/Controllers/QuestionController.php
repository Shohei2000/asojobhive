<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyQuestionReply;
use App\Models\CompanyQuestion;
use App\Models\Notification;

use Illuminate\Http\Request;
class QuestionController extends Controller
{
    /**
     * 質問画面の表示
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showQuestions($companyId)
    {

        $company = Company::findOrFail($companyId);
        $questions = $company->questions;

        //if ($questions->isEmpty()) {
        //  abort(404, 'Questions not found');
        //}

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

        // 質問オブジェクトを取得
        $question = CompanyQuestion::findOrFail($request->question_id);

         // 質問への URL を生成
        $questionUrl = $this->generateQuestionUrl($question->company_id, $question->id);


        // URL を通知に直接追加し、データベースに保存
        $notification = new Notification([
            'title' => '質問に回答がありました。',
            'url' => $questionUrl,
        ]);
        $notification->save();

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

        //正常にデータが挿入されたら、通知を作成
        $notification = new Notification();
        $notification->title = $company->company_name .'に質問が投稿されました。';
        $notification->save();

        return redirect()->route('company.questions', ['companyId' => $company->id])->with('success', '質問が投稿されました。');
    }

    /**
     * 質問の詳細画面を表示
     *
     * @param int $companyId
     * @param int $questionId
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showQuestion($companyId, $questionId)
    {
        $company = Company::findOrFail($companyId);
        $question = CompanyQuestion::findOrFail($questionId);
        $replies = CompanyQuestionReply::where('company_question_id', $questionId)->get();

        return view('jobs.question', compact('company', 'question', 'replies'));
    }
    /**
     * これはURLを作成するやつ
     */
    protected function generateQuestionUrl($companyId, $questionId)
    {
        return url("/companies/{$companyId}/questions/{$questionId}");
    }
}
