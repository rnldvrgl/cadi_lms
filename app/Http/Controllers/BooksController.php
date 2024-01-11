<?php

namespace App\Http\Controllers;

use App\Models\cadi_all_notification;
use App\Models\cadi_book;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_log;
use App\Models\cadi_penalty_amount;
use App\Models\cadi_user;
use App\Models\cadi_user_notification;
use Carbon\Carbon;
use Database\Seeders\cadi_user_notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{

    function getAllTransactionInfo(){
        if(Session::get('user_type') == "student"){
            $studentId = Session::get('user_id');
            //return view('components.404',[
            //     'errorCode'=>'404',
            //     'headMessage' => 'Page not found',
            //     'message' => 'This page is missing <br> <a href="./"> Go back</a>'
            // ]);
            $transaction_info = DB::table("cadi_borrowed_book_infos as cbbi")
            ->join("cadi_users as cu","cu.id","=", "cbbi.user_id")
            ->join("cadi_books as cb","cb.id","=", "cbbi.book_id")
            ->select("cbbi.*","cu.name", "cb.title")
            ->where('cbbi.user_id', $studentId) // Filter by the logged-in student's ID
            ->where('cbbi.deleted_at', null)
            ->get();
            $showOverdueNotifications = cadi_borrowed_book_info::where('due_date', '<', date('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->get();
            $showOverdueNotificationsCount = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->count();
            $oneYearAgo = Carbon::now()->subDays(365)->toDateString();
            $getAllNotifications = cadi_all_notification::where('date_created','>',$oneYearAgo)
                ->get();
            $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$oneYearAgo)
                ->count();
            $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->get();
            $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->count();
            $penalty = cadi_user::where('id', Session::get('user_id'))
                ->where('penalty', 15)
                ->count();

            $overdueNotificationMessage = "";
            if($showOverdueNotifications){
                $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                         please return it immediately to avoid penalties";
            }
                return view('student_transaction/student_transaction',[
                    'borrowTransactionInfos' => $transaction_info,
                    'allNotificationInfos'=>$getAllNotifications,
                    'overdueNotification' => $overdueNotificationMessage,
                    'allUserNotificationInfos'=>$getUserNotifications,
                    'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
                    'penalty' => $penalty
                ]);
        }
        else {
            $transaction_info = DB::table("cadi_borrowed_book_infos as cbbi")
                ->join("cadi_users as cu","cu.id","=", "cbbi.user_id")
                ->join("cadi_books as cb","cb.id","=", "cbbi.book_id")
                ->select("cbbi.*","cu.name", "cb.title")
                ->where('cbbi.deleted_at', null)
                ->get();
            $showOverdueNotifications = cadi_borrowed_book_info::where('due_date', '<', date('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->get();
            $showOverdueNotificationsCount = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->count();
            $oneYearAgo = Carbon::now()->subDays(365)->toDateString();
            $getAllNotifications = cadi_all_notification::where('date_created','>',$oneYearAgo)
                ->get();
            $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$oneYearAgo)
                ->count();
            $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->get();
            $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->count();
            $penalty = cadi_user::where('id', Session::get('user_id'))
                ->where('penalty', 15)
                ->count();

            $overdueNotificationMessage = "";
            if($showOverdueNotifications){
                $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                         please return it immediately to avoid penalties";
            }
                return view('student_transaction/show_borrow_requests',[
                    'borrowTransactionInfos' => $transaction_info,
                    'allNotificationInfos'=>$getAllNotifications,
                    'overdueNotification' => $overdueNotificationMessage,
                    'allUserNotificationInfos'=>$getUserNotifications,
                    'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
                    'penalty' => $penalty
                ]);
            }
    }
    
    function addNotificationForOverdue(Request $request){
//        ddd($request->all());
// Create a new UserNotificatio               $getAllNotifications = cadi_all_notification::where('date_created','>',$oneYearAgo)
//                    ->get();
//                $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$oneYearAgo)
//                    ->count();
//                $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
//                    ->orderBy('date_created', 'desc')
//                    ->get();
//                $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
//                    ->orderBy('date_created', 'desc')
//                    ->count();n record.
        $userNotification = new cadi_user_notification();
        $userNotification->user_id = $request->input('idOfStudentToNotify');
        $userNotification->notif_message = "Please return the books you borrowed immediately";
        $userNotification->date_created = date('Y-m-d');
        $userNotification->time_created = date('H:i:s');
        $userNotification->notif_title = $request->input('nameOfStudentToNotify');
        $userNotification->notif_redirect = "www.facebook.com";

// Save the record to the database.
        $userNotification->save();

        return redirect('/borrow-requests')->with('success', 'Successfully notified user about his/here overdue.');
    }
    function createPenalty(){
        $student_penalties =  cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
            ->where('is_returned', 0)
            ->get();
//        ddd($student_penalties);

        foreach ($student_penalties as $sp){
                $checkIfPaid = cadi_user::where('penalty_paid', '1')
                ->where('id', $sp->user_id)
                ->get();
                if($checkIfPaid){
                    $sp = cadi_user::find($sp->user_id);
                    $sp->penalty = 15;
                    $sp->save();
                }
        }



//        foreach ($student_penalties as $student_penalty) {
//            $checkIfPaid = cadi_penalty_amount::where('is_paid', '1')
//                ->where('user_id', $student_penalty->book_id)
//                ->get();
//            $checkIfExisting = cadi_penalty_amount::where('user_id', $student_penalty)
//                ->where('created_at', '<=',date('Y-m-d'))
//                ->get();
//            if($checkIfPaid == "0" && $checkIfExisting){
//                $student_penalty_fee = new cadi_penalty_amount();
//                $student_penalty_fee->user_id = $student_penalty->user_id;
//                $student_penalty_fee->amount = 12;
//                $student_penalty_fee->created_at = date('Y-m-d');
//                $student_penalty_fee->updated_at = date('Y-m-d');
//                $student_penalty_fee->save();
//            }
//
//
//        }
    }
    function getAllBooks(){
        $this->createPenalty();
        if(Session::get('user_type') == "student"){
        $data = cadi_book::where('is_archived', '==', 0)->get();
        }else{
           $data = cadi_book::get(); 
        }
        $totalBook = cadi_book::count();
//ddd($data);
        $oneYearAgo = Carbon::now()->subDays(365)->toDateString();

        $getAllNotifications = cadi_all_notification::where('date_created','>',$oneYearAgo)
            ->get();
        $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$oneYearAgo)
            ->count();
        $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
            ->orderBy('date_created', 'desc')
            ->get();
        $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
            ->orderBy('date_created', 'desc')
            ->count();
        $showOverdueNotifications = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
            ->where('id', Session::get('user_id'))
            ->where('is_returned', 0)
            ->get();
        $overdueNotificationMessage = "";
        if($showOverdueNotifications){
            $overdueNotificationMessage = b"The last book you borrowed has reach it's due date,
                     please return it immediately to avoid penalties";
        }
        $showOverdueNotificationsCount = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
            ->where('id', Session::get('user_id'))
            ->where('is_returned', 0)
            ->count();
        $penalty = cadi_user::where('id', Session::get('user_id'))
            ->where('penalty', 15)
            ->count();

        if(isset($showOverdueNotifications) && empty($showOverdueNotifications)){
            $OverdueNotifications = "hello";
        }else{
            $OverdueNotifications = "not set";
        }

//        ddd($OverdueNotifications);
        Session::put('totalBooks', $totalBook);
        return view('components/view_books', [
            'books'=> $data,
            'allNotificationInfos'=>$getAllNotifications,
            'overdueNotification' => $overdueNotificationMessage,
            'allUserNotificationInfos'=>$getUserNotifications,
            'showOverdueNotifications'=> $OverdueNotifications,
            'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
            'penalty' => $penalty
        ]);
    }

    function deleteBook(Request $request){

        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Deleted a book. Title: ". $request->input('nameOfItemToDelete'),
            'date_done'=> date('Y/m/d'),
            'time_done'=>date('H:i:s')

        ];
        cadi_log::create($log_data);

        $bookToDelete = cadi_book::find($request->input('id'));
        $bookToDelete->delete();

        return redirect('/view-books')->with('success','Deleted book successfully');
    }

    function addBooks(Request $request){
        $request->validate([
            'add_access_no'=> 'required',
            'title'=> 'required',
            'author'=> 'required | regex:/^[a-zA-Z\s]+$/',
            'available_count'=> 'required',
            'add_publication_place'=> 'required',
            'publisher'=> 'required',
            'copyright'=> 'required',
            'borrowed_count'=> 'required',
            'num_copies'=> 'required'
        ]);
        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Added book. Title: ". $request->input('title'),
            'date_done'=> date('Y/m/d'),
            'time_done'=>date('H:i:s')
        ];
        cadi_log::create($log_data);
        $BookNotif = new cadi_all_notification();
        $BookNotif->notif_title = 'A new book has been added';
        $BookNotif->notif_message = '"'.$request->input('title') . '" has recently been added to the list of books.';
        $BookNotif->date_created = date('Y-m-d');
        $BookNotif->time_created = date('H:i:s');
        $BookNotif->notif_redirect= '#';
        $BookNotif->save();

        $book = new cadi_book();
        $book->accesson_number =$request->input('add_access_no');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->place_of_publication =$request->input('add_publication_place');
        $book->publisher = $request->input('publisher');
        $book->copyright = $request->input('copyright');
        $book->available_count = $request->input('available_count');
        $book->borrowed_count = $request->input('borrowed_count');
        $book->number_of_copies = $request->input('num_copies');

        $book->save();

        return redirect('/view-books')->with('success', 'You have added a book successfully');

    }
    function archiveBooks(Request $request){

        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Archived a book. Title: ". $request->input('NameOfBookToArchive'),
            'date_done'=> date('Y/m/d'),
            'time_done'=>date('H:i:s')

        ];
        cadi_log::create($log_data);

        $books = cadi_book::find($request->input('id'));
//        if($user){
        $books->is_archived = "1";
        $books->save();

        return redirect('/view-books') ->with('success', 'Book has been successfully archived');
    }

    function unarchiveBooks(Request $request){

        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Unarchived a book. Title: ". $request->input('NameOfBookToUnarchive'),
            'date_done'=> date('Y/m/d'),
            'time_done'=>date('H:i:s')

        ];
        cadi_log::create($log_data);

        $books = cadi_book::find($request->input('id'));
//        if($user){
        $books->is_archived = "0";
        $books->save();

        return redirect('/view-books') ->with('success', 'Book has been successfully unarchived');
    }

    function editBooks(Request $request){
        $request->validate([
            'access_no'=> 'required',
            'title'=> 'required',
            'author'=> 'required | regex:/^[a-zA-Z\s]+$/',
            'available_count'=> 'required',
            'publication_place'=> 'required',
            'publisher'=> 'required',
            'copyright'=> 'required',
            'borrowed_count'=> 'required',
            'num_copies'=> 'required'
        ]);
        //    ddd($request->input('idToEdit'));
//        $books = cadi_book::where('id', $request->input('id'))->first();
        $books = cadi_book::find($request->input('idToEdit'));
    
        $books->accesson_number = $request->input('access_no');
        $books->author = $request->input('author');
        $books->title = $request->input('title');
        $books->place_of_publication = $request->input('publication_place');
        $books->publisher = $request->input('publisher');
        $books->copyright = $request->input('copyright');
        $books->available_count = $request->input('available_count');
        $books->borrowed_count = $request->input('borrowed_count');
        $books->number_of_copies = $request->input('num_copies');
        $books->save();

        return redirect('/view-books')->with('success', 'You have edited a book successfully');
    }

}
