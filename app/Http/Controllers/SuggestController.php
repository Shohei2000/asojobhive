<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function suggest(Request $request)
    {
        $keyword = $request->input('keyword');

        $result = Company::where(function ($query) use ($keyword) {
            $query->where('company_name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('company_name_kana', 'LIKE', '%' . $keyword . '%');
        })
        ->take(5)
        ->pluck('company_name');

        return response()->json($result);
    }
}
