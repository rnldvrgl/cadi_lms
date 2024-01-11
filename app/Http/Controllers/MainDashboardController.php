<?php

namespace App\Http\Controllers;

use App\Models\cadi_book;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_all_notification;
use App\Models\cadi_user;
use App\Models\cadi_user_notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\countOf;

class MainDashboardController extends Controller
{
    function  getTotalAllCount(){
        if(Session::has('name')) {
            $userType = Session::get('user_type');
            $penalty = cadi_user::where('id', Session::get('user_id'))
                ->where('penalty', 15)
                ->count();

            if($userType == "admin" || $userType =="librarian" || $userType =="student"){
                // The session variable 'se)
                $totalBooks = cadi_book::sum('number_of_copies');
//                $availableBooks = cadi_book::whereColumn('available_count','>','borrowed_count')
                $availableBooks = cadi_book::where('is_archived', 0)
                    ->sum('available_count');
//                $borrowedBooks = cadi_book::whereColumn('borrowed_count','>=','available_count')
                $borrowedBooks = cadi_book::where('is_archived', 0)
                    ->sum('borrowed_count');
//                ddd($borrowedBooks);
                $archivedBooks = cadi_book::where('is_archived', '1')
                    ->where('is_archived', 1)
                    ->count();

                $totalStudents = cadi_user::where('usertype', 'student')->count();

                $totalActiveStudents = cadi_user::where('is_active', 1)
                    ->where('is_active', 1)
                    ->where('is_banned', 0)
                    ->where('usertype', 'student')
                    ->count();
                $totalInactiveStudents = cadi_user::where('is_active', 0)
                    //                ->where('is_banned', 0)
                    ->where('usertype', 'student')
                    ->count();
                $totalBannedStudents = cadi_user::where('is_banned', 1)
                    ->where('usertype', 'student')
                    ->count();
                // Calculate the date 7 days ago from now
                $sevenDaysAgo = Carbon::now()->subDays(7)->toDateString();
//                ddd($sevenDaysAgo);
                $dateToday = date('Y-m-d');
                // Retrieve books added in the past 7 days
                $recentBooks = cadi_book::where('date_added', '>=', $sevenDaysAgo)
//                    ->where('date_added', '<=', $dateToday)
                    ->where('is_archived', 0)
                    ->get();
//                ddd($recentBooks);
                $overDue = cadi_borrowed_book_info::where('due_date', '<', date('Y-m-d'))
                    ->where('is_returned', 0)
                    ->count();
                $showOverdueNotifications = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
                    ->where('id', Session::get('user_id'))
                    ->where('is_returned', 0)
                    ->get();
//                ddd($showOverdueNotifications);
                $showOverdueNotificationsCount = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
                    ->where('id', Session::get('user_id'))
                    ->where('is_returned', 0)
                    ->count();
                $oneYearAgo = Carbon::now()->subDays(365)->toDateString();
                $threeDaysAgo = Carbon::now()->subDays(3)->toDateString();
                $getAllNotifications = cadi_all_notification::where('date_created','>',$threeDaysAgo)
                    ->get();
                $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$threeDaysAgo)
                    ->count();
                $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
                    ->orderBy('date_created', 'desc')
                    ->get();
                $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
                    ->orderBy('date_created', 'desc')
                    ->count();
//                ddd($getUserNotifications);

                $overdueNotificationMessage = "";
                if($showOverdueNotifications){
                    $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                     please return it immediately to avoid penalties";
                }
//    ddd(1);
                return view('main_dashboard',[
                    'recent_books' => $recentBooks,
                    'title'=> 'LMS Dashboard',
                    'totalBooks' => $totalBooks,
                    'totalBorrowedBooks' => $borrowedBooks,
                    'totalAvailableBooks'=> $availableBooks,
                    'totalArchivedBooks' => $archivedBooks,
                    'totalStudents' => $totalStudents,
                    'totalActiveStudents'=> $totalActiveStudents,
                    'totalInactiveStudents' => $totalInactiveStudents,
                    'totalBannedStudents' => $totalBannedStudents,
                    'overdue'=>$overDue,
                    'allNotificationInfos'=>$getAllNotifications,
                    'overdueNotification' => $overdueNotificationMessage,
                    'allUserNotificationInfos'=>$getUserNotifications,
                    'showOverdueNotifications' =>$showOverdueNotifications,
                    'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
                    'penalty' => $penalty

                ]);
            }
            else{
                return view('components/404');
            }
        }else{
            return view('components/404');
        }

    }
    function getUserType(){
        $email = Session::get('email');
        $user = cadi_user::where('email', $email)
            ->first();
        Session::put('userType', $$user->user->usertype);
    }

}
