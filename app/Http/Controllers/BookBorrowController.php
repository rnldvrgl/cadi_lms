<?php

namespace App\Http\Controllers;

use App\Models\cadi_all_notification;
use App\Models\cadi_book;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_log;
use App\Models\cadi_user;
use App\Models\cadi_user_notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookBorrowController extends Controller
{
    public function checkIfBookIsArchived($id){
        $bookData = cadi_book::where('id', $id)->get();
        return $bookData[0]->is_archived;
    }
    public function checkIfUserISBanned($id){
        $userData = cadi_user::where('id', $id)->get();
        return $userData[0]->is_banned;
    }
    public function showBorrowBook($id, $userId)
    {
        if ($this->checkIfBookIsArchived($id)) {
            return view("components/404",
                [
                    "errorCode" => 404,
                    "title" => "404 - Book not found",
                    "headMessage" => "Book is Archived",
                    "message" => "You cannot borrow an archived book"
                ]);

        }elseif ($this->checkIfUserISBanned($userId)){
            return view("components/404",
                [
                    "errorCode" => 403,
                    "title" => "403 - Forbidden",
                    "headMessage" => "Sorry, you are banned",
                    "message" => "You cannot borrow a book if you are banned please contact the librarian to address this issue."
                ]);
        }else{
            $bookData = cadi_book::where('id', $id)->get();
            $userData = cadi_user::where('id', $userId)->get();
            if(intval($bookData[0]->available_count) > 0){
                return view('borrow/borrow_book',
                    [
                        'borrow_info'=> $bookData[0],
                        'user_info'=> $userData[0]
                    ]
                );
            }else{
                return view("components/404",
                    [
                        "error_code" => 404,
                        "title" => "404 - Book not found",
                        "headMessage"=>"Book Not Found",
                        "message"=>"Failed finding the book"
                    ]);
            }
        }

    }
    public function showReturnBook($id, $userId)
    {
        if ($this->checkIfBookIsArchived($id)) {
            return view("components/404",
                [
                    "errorCode" => 404,
                    "title" => "404 - Book not found",
                    "headMessage" => "Book is Archived",
                    "message" => "Please contact librarian if the book you are returning is archived"
                ]);

        }elseif ($this->checkIfUserISBanned($userId)){
            return view("components/404",
                [
                    "errorCode" => 403,
                    "title" => "403 - Forbidden",
                    "headMessage" => "Sorry, you are banned",
                    "message" => "Please contact librarian if you are banned and you have to return a book"
                ]);
        }else{
            $bookData = cadi_book::where('id', $id)->get();
            $userData = cadi_user::where('id', $userId)->get();
            if(intval($bookData[0]->available_count) > 0){
                return view('borrow/return_book',
                    [
                        'borrow_info'=> $bookData[0],
                        'user_info'=> $userData[0]
                    ]
                );
            }else{
                return view("components/404",
                    [
                        "error_code" => 404,
                        "title" => "404 - Book not found",
                        "headMessage"=>"Book Not Found",
                        "message"=>"Failed finding the book"
                    ]);
            }
        }

    }

    /**
     * @throws \Exception
     */
    public function processBorrowBook(Request $request){

        $borrow_data = cadi_borrowed_book_info::where("is_returned", 0)
                                                ->where("user_id",   Session::get('user_id'))
                                                ->count();
//        ddd($borrow_data);
        if("$borrow_data" > 3){
            return redirect("borrow-requests")->with('failed','You have to return your borrowed book first.');
        }else {
            $updateBookRecord = cadi_book::find($request->input('book_id'));
            //            ddd($updateBookRecord);
            $updateBookRecord->borrowed_count = $updateBookRecord->borrowed_count + 1;
            $updateBookRecord->available_count = $updateBookRecord->available_count - 1;
            $updateBookRecord->save();

            $borrow_data = new cadi_borrowed_book_info();
            $borrow_data->user_id = $request->input('borrower_id');
            $borrow_data->book_id = $request->input('book_id');
            $borrow_data->date_borrowed = Carbon::now('Asia/Manila')->format("Y-m-d");
            $borrow_data->process_id = random_int(000000000, 99999999);
            $borrow_data->due_date = Carbon::now()->addDays(3)->toDateString();
            $borrow_data->return_date = null;
            $borrow_data->is_returned = 000;

            $borrow_data->save();

            return redirect("borrow-requests")->with('success', 'Book borrow has been issued successfully.');
        }
    }
    public  function markStudentPaid(Request $request){
        $BookID = $request->input('BookIDToPaid');
        $UserID =  $request->input('studentToMarkPaid');
        $ProcessID =  $request->input('ProcessID');
//        ddd($BookID);
        $oneDayAgo = Carbon::now()->subDays(1)->toDateString();
        $bookReturn = cadi_borrowed_book_info::where('book_id', $BookID)
                                                ->where('user_id', $UserID)
                                                ->where('process_id', $ProcessID)
                                                ->first();

//        ddd($bookReturn[0]->is_returned);
//        ddd($bookReturn->user_id == $UserID );

        if($bookReturn->is_returned== 1 && $bookReturn->user_id == $UserID && $bookReturn->book_id ==$BookID && $bookReturn->return_date != Carbon::now('Asia/Manila')->format('Y-m-d')){
            return response("Book is already returned");
        }else{
            $updateBookRecord = cadi_book::where('id', $request->input('BookIDToPaid'))->get();
//            ddd($updateBookRecord);
            $updateBookRecord[0]->borrowed_count = $updateBookRecord[0]->borrowed_count-1;
            $updateBookRecord[0]->available_count = $updateBookRecord[0]->available_count+1;
            $updateBookRecord[0]->save();
            if ($bookReturn) {
                $bookReturn->is_returned = 1;
                $bookReturn->return_date = Carbon::now('Asia/Manila')->format("Y-m-d");
                $bookReturn->save();
                $student_info = cadi_user::find($UserID);
                $student_info->penalty = null;
                $student_info->penalty_paid = 1;
                $student_info->save();

                return redirect("borrow-requests")->with('success','Transaction has been successfully marked as paid');
            } else {
                // Handle the case where no record with 'borrow_id' 1 was found.
                return redirect("borrow-requests")->with('failed','Failed to mark as paid.');
            }
        }
    }
    public function showReturnPage(){
        $oneYearAgo = Carbon::now()->subDays(365)->toDateString();

        $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$oneYearAgo)
            ->count();
        $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
            ->orderBy('date_created', 'desc')
            ->get();
        $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
            ->orderBy('date_created', 'desc')
            ->count();
        $showOverdueNotifications = cadi_borrowed_book_info::where ('due_date', '<', Carbon::now('Asia/Manila')->format('Y-m-d'))
            ->where('id', Session::get('user_id'))
            ->where('is_returned', 0)
            ->get();
        $showOverdueNotificationsCount = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
            ->where('id', Session::get('user_id'))
            ->where('is_returned', 0)
            ->count();
        $getAllNotifications = cadi_all_notification::where('date_created','>',$oneYearAgo)
            ->get();
        $penalty = cadi_user::where('id', Session::get('user_id'))
            ->where('penalty', 15)
            ->count();
        $overdueNotificationMessage = "";
        if($showOverdueNotifications){
            $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                     please return it immediately to avoid penalties";
        }
        return view('student_transaction.ReturnBook',[

            'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
            'overdueNotification' => $overdueNotificationMessage,
            'allUserNotificationInfos'=>$getUserNotifications,
            'allNotificationInfos'=>$getAllNotifications,
            'penalty' => $penalty

        ]);
    }
    public function showBorrowPage(){

        $oneYearAgo = Carbon::now()->subDays(365)->toDateString();

        $getAllNotificationsCount = cadi_all_notification::where('date_created','>',$oneYearAgo)
            ->count();
        $getUserNotifications = cadi_user_notification::where('date_created','>',$oneYearAgo)
            ->orderBy('date_created', 'desc')
            ->get();
        $getUserNotificationsCount = cadi_user_notification::where('date_created','>',$oneYearAgo)
            ->orderBy('date_created', 'desc')
            ->count();
        $showOverdueNotifications = cadi_borrowed_book_info::where ('due_date', '<', Carbon::now('Asia/Manila')->format('Y-m-d'))
            ->where('id', Session::get('user_id'));
        $UserID =  intval(Session::get('user_id'));
        $oneDayAgo = Carbon::now()->subDays(1)->toDateString();
        $bookReturn = cadi_borrowed_book_info::find(Session::get('user_id'));
//        ddd($bookReturn->is_returned);

        $showOverdueNotificationsCount = cadi_borrowed_book_info::where ('due_date', '<', date('Y-m-d'))
            ->where('id', Session::get('user_id'))
            ->where('is_returned', 0)
            ->count();
        $getAllNotifications = cadi_all_notification::where('date_created','>',$oneYearAgo)
            ->get();
        $penalty = cadi_user::where('id', Session::get('user_id'))
            ->where('penalty', 15)
            ->count();
        $overdueNotificationMessage = "";
        if($showOverdueNotifications){
            $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                     please return it immediately to avoid penalties";
        }
        return view('student_transaction.BorrowBook',[

            'notifCount' => array_sum([$getAllNotificationsCount, $getUserNotificationsCount, $showOverdueNotificationsCount]),
            'overdueNotification' => $overdueNotificationMessage,
            'allUserNotificationInfos'=>$getUserNotifications,
            'allNotificationInfos'=>$getAllNotifications,
            'penalty' => $penalty


        ]);
    }
    public function processReturnBook(Request $request){
        $BookID = $request->input('book_id');
        $BorrowerID =  intval($request->input('borrower_id'));
        $bookReturn = cadi_borrowed_book_info::where('book_id', $BookID)->where('user_id', $BorrowerID)->where('is_returned', 0)->first();
    //    dd($bookReturn);

        if(!$bookReturn){
            return redirect("return-requests")->with('failed','Record was not found.');
        }

        if($bookReturn->return_date != null){
            return redirect("return-requests")->with('failed','This book is already returned.');
        }else{
            $updateBookRecord = cadi_book::where('id', $request->input('book_id'))->get();
//            ddd($updateBookRecord);
            $updateBookRecord[0]->borrowed_count = $updateBookRecord[0]->borrowed_count-1;
            $updateBookRecord[0]->available_count = $updateBookRecord[0]->available_count+1;
            $updateBookRecord[0]->save();
            if ($bookReturn) {
                $bookReturn->is_returned = 1;
                $bookReturn->return_date = Carbon::now('Asia/Manila')->format("Y-m-d");
                $bookReturn->save();

                return redirect("return-requests")->with('success','Book has been successfully returned');
            } else {
                // Handle the case where no record with 'borrow_id' 1 was found.
                return redirect("return-requests")->with('failed','Record was not found.');
            }
        }
    }


    function deleteTransaction(Request $request){

        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Deleted a transaction. transaction ID: ". $request->input('transaction_id'),
            'date_done'=> Carbon::now('Asia/Manila')->format('Y/m/d'),
            'time_done'=>Carbon::now('Asia/Manila')->format('H:i:s')
        ];
        cadi_log::create($log_data);

        $removePenalty = cadi_user::find($request->input('user_id'));
        $removePenalty->penalty = null;
        $removePenalty->save();
        $bookToDelete = cadi_borrowed_book_info::find($request->input('process_id'));
        $bookToDelete->delete();

        return redirect('/borrow-requests')->with('success','You have successfully deleted a transaction.');
    }
}

