<?php

namespace App\Http\Controllers;

use App\Models\cadi_all_notification;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_user;
use App\Models\cadi_user_notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogsController extends Controller
{
    function viewLogs(){
        if(Session::get('user_type') == "student"){
            return view('components.404',[
                'errorCode'=>'404',
                'headMessage' => 'Page not found',
                'message' => 'This page is missing <br> <a href="./"> Go back</a>'
            ]);
        }
        else {
            $oneYearAgo = Carbon::now()->subDays(365)->toDateString();

            $getAllNotificationsCount = cadi_all_notification::where('date_created', '>', $oneYearAgo)
                ->count();
            $getUserNotifications = cadi_user_notification::where('date_created', '>', $oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->get();
            $getUserNotificationsCount = cadi_user_notification::where('date_created', '>', $oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->count();
            $showOverdueNotifications = cadi_borrowed_book_info::where('due_date', '<', date('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->get();
            $showOverdueNotificationsCount = cadi_borrowed_book_info::where('due_date', '<', date('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->count();
            $getAllNotifications = cadi_all_notification::where('date_created', '>', $oneYearAgo)
                ->get();
            $penalty = cadi_user::where('id', Session::get('user_id'))
                ->where('penalty', 15)
                ->count();
            $overdueNotificationMessage = "";
            if ($showOverdueNotifications) {
                $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                         please return it immediately to avoid penalties";
            }
            return view('reports/logReports/logs', [

                'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
                'overdueNotification' => $overdueNotificationMessage,
                'allUserNotificationInfos' => $getUserNotifications,
                'allNotificationInfos' => $getAllNotifications,
                'penalty' => $penalty


            ]);
        }
    }
}
