<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //通知モーダル用
    public function fetchNotifications()
    {
        $latestNotification = Notification::latest('created_at')->first(); // 最新の通知を取得
        $formattedNotification = [
            'title' => $latestNotification->title,
            'created_at' => $latestNotification->created_at,
            'url' => $latestNotification->url
        ];

        Log::info($formattedNotification); // ログに最新の通知を記録

        return response()->json($formattedNotification); // 最新の通知をJSON形式で返す
    }
}
