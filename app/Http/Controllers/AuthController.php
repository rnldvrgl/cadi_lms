<?php
namespace App\Http\Controllers;

use App\Models\cadi_all_notification;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_log;
use App\Models\cadi_user_notification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cadi_user;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendVerificationMailer;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    function editStudent(Request $request){
//        $books = cadi_book::where('id', $request->input('id'))->first();
        $student = cadi_user::find($request->input('studentIdToEdit'));
        $student->name = $request->input('edit_name');
        $student->uname = $request->input('edit_username');
        $student->email = $request->input('edit_email');
        $student->grade = $request->input('edit_grade');
        $student->section = $request->input('edit_section');
        $student->is_active = $request->input('edit_active');
        $student->is_banned = $request->input('edit_banned');
        $student->save();

        return redirect('view-students')->with('success', 'you\'ve succeffuly edited the student info');
    }

    function archiveStudent(Request $request){

        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Archived a student. Student name: ". $request->input('NameOfStudentToArchive'),
            'date_done'=> Carbon::now('Asia/Manila')->format('F-d-Y'),
            'time_done'=>Carbon::now('Asia/Manila')->format('H:i:s')

        ];
        cadi_log::create($log_data);
        $student = cadi_user::find($request->input('idOfStudentToArchive'));
        $student->is_archived = "1";
        $student->save();
        return redirect('/view-students')->with('success','You have successfully archived '.$student->name);
    }

    function unarchiveStudent(Request $request){

        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Unarchived a student. Student name: ". $request->input('NameOfStudentToUnarchive'),
            'date_done'=> Carbon::now('Asia/Manila')->format('F-d-Y'),
            'time_done'=>Carbon::now('Asia/Manila')->format('H:i:s')
        ];
        cadi_log::create($log_data);
        $student = cadi_user::find($request->input('idOfStudentToUnarchive'));
        // dd($request);
        $student->is_archived = "0";
        $student->save();

        return redirect('/view-students')->with('success','You have successfully unarchived '.$student->name);
    }

    function banStudent(Request $request){
        $log_data = [
            'user_name' => Session::get('name'),
            'action_done' => "Banned ". $request->input('NameOfStudentToBan'),
            'date_done'=> Carbon::now('Asia/Manila')->format('Y/m/d'),
            'time_done'=> Carbon::now('Asia/Manila')->format('H:i:s')

        ];
        cadi_log::create($log_data);


//        $student = cadi_user::find($request->input('idOfStudentToBan'));
        $student = cadi_user::find($request->input('idOfStudentToBan'));
//        if($user){
        $student->is_banned = "1";
        $student->save();
        return redirect('view-students')->with('success', 'You have successfully banned '.'Session::get("name")'.' user');
    }
    function showProfilePage(){
        $showOverdueNotifications = cadi_borrowed_book_info::where('due_date', '<', date('Y-m-d'))
            ->where('id', Session::get('user_id'))
            ->where('is_returned', 0)
            ->get();
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
        return view('profile', [
            'user_id'=>Session::get('user_id'),
            'name'=>Session::get('name'),
            'email'=>Session::get('email'),
            'grade'=>Session::get('grade'),
            'section'=>Session::get('section'),
            'user_type'=>Session::get('user_type'),
            'date_created'=> Session::get('date_created'),
            'allNotificationInfos'=>$getAllNotifications,
            'overdueNotification' => $overdueNotificationMessage,
            'notifCount'=> $getAllNotificationsCount,
            'allUserNotificationInfos'=> $getUserNotifications,
            'penalty'=> $penalty
        ]);
    }
    function getAllStudents(){
        if(Session::get('user_type') == "student"){
            return view('components.404',[
                'errorCode'=>'404',
                'headMessage' => 'Page not found',
                'message' => 'This page is missing <br> <a href="./"> Go back</a>'
            ]);
        }
        else {
            $data = cadi_user::where('usertype', 'student')->get();
            $showOverdueNotifications = cadi_borrowed_book_info::where('due_date', '<', Carbon::now('Asia/Manila')->format('Y-m-d'))
                ->where('id', Session::get('user_id'))
                ->where('is_returned', 0)
                ->get();
            $oneYearAgo = Carbon::now()->subDays(365)->toDateString();
            $getAllNotifications = cadi_all_notification::where('date_created', '>', $oneYearAgo)
                ->get();
            $getAllNotificationsCount = cadi_all_notification::where('date_created', '>', $oneYearAgo)
                ->count();
            $getUserNotifications = cadi_user_notification::where('date_created', '>', $oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->get();
            $getUserNotificationsCount = cadi_user_notification::where('date_created', '>', $oneYearAgo)
                ->orderBy('date_created', 'desc')
                ->count();
            $penalty = cadi_user::where('id', Session::get('user_id'))
                ->where('penalty', 15)
                ->count();
            $overdueNotificationMessage = "";
            if ($showOverdueNotifications) {
                $overdueNotificationMessage = "The last book you borrowed has reach it's due date,
                         please return it immediately to avoid penalties";
            }
            return view('components/view_students', [
                'all_student' => $data,
                'allNotificationInfos' => $getAllNotifications,
                'overdueNotification' => $overdueNotificationMessage,
                'notifCount' => $getAllNotificationsCount,
                'allUserNotificationInfos' => $getUserNotifications,
                'penalty' => $penalty

            ]);
        }
    }

    public function performLogin(Request $request){
        $request->validate([
            'email'=>'required | email | max:50',
            'password'=>'required | min:5 | max:16'
        ]);
        try {
            if(Session::get('user_id')){
                return redirect('dashboard')->with('success', 'You have successfully logged in.');
            }else{
                $email = $request->input('email');
                $password = $request->input('password');

                $user = cadi_user::where('email', $email)
                    ->where('pword', $password)
                    ->first();
                if($user->is_active == 0){
                    return view('components.404',[
                        'errorCode'=>'404',
                        'headMessage' => 'Missing or Inactive account',
                        'message' => 'You may not be registered or your account is not active, please contact your librarian to activate your account'
                    ]);
                }
                else if($user->is_banned == 1){
                    return view('components.404',[
                        'errorCode'=>'401',
                        'headMessage' => 'Banned account',
                        'message' => 'Your account is banned, please contact your librarian if you think this is a mistake'
                    ]);

                }
                else if($user->is_archived == 1){
                    return view('components.404',[
                        'errorCode'=>'401',
                        'headMessage' => 'Account Archived',
                        'message' => 'Your account is archived, please contact your librarian if you wish to use your account'
                    ]);
                }
                else if ($user) {
                    //GET THE USER'S LAST LOGIN TIME AND DATE
                    $userLog = cadi_user::find($user->id);
        //        if($user){
                    $userLog->last_login = Carbon::now('Asia/Manila')->format('F-d-Y - h:i:s A'); 
                    $userLog->save();
                    //END OF GET THE USER'S LAST LOGIN TIME AND DATE
                    Session::put('user_id', $user->id);
                    Session::put('last_login_time_date', Carbon::now('Asia/Manila')->format('F-d-Y - h:i:s A'));
                    Session::put('current_user', $user);
                    Session::put('name', $user->name);
                    Session::put('email', $user->email);
                    Session::put('grade', $user->grade);
                    Session::put('section', $user->section);
                    Session::put('user_type', $user->usertype);
                    Session::put('date_created', $user->created_at);
                    // Successful login
                    return redirect('dashboard')->with('success', 'You have successfully logged in.');
                } else {
                    // Failed login
                    return view('login', ['error' => 'Invalid credentials'], $request->input());
                }
            }
        }catch (Exception  $e){
            $email = $request->input('email');
            $password = $request->input('password');
            return view('login', [
                'error' => 'Invalid credentials',
                'old' => ['email'=>$email, 'password'=>$password]
            ], $request->input());
        }
    }
    public function deleteUser(Request $request): RedirectResponse
    {

        $userToDelete = cadi_user::find($request->input('id'));
        $userToDelete->delete();


        return redirect('view-students')->with('success', 'You have successfully deleted  user.');
    }
    public function addNewUser(Request $request): RedirectResponse
    {
        //VALIDATE THE VALUE OF SUBMITTED FORM
        $request->validate([
            'name' => 'required | regex:/^[a-zA-Z\s]+$/',
            'email'=>'required |max:50 | email',
            'password'=>'required | min:5 | max:16 | confirmed',
            'password_confirmation' => 'required',

        ]);

        $email = $request->input('email');
        $pword = $request->input('password');
        $checkUser = cadi_user::where('email', $email)->first();
        if($checkUser){
            return redirect('register')->with('failed', 'Your chosen email address is already taken');
        }else{
            $data = [
                'name' => $request->input('name'),
                'uname' => $request->input('email'),
                'email' => $email,
                'pword' => $pword,
            ];
            cadi_user::create($data);
            $user = cadi_user::where('email', $email)
                ->where('pword', $pword)
                ->first();
            Session::put('user_id', $user->id);
            Session::put('last_login_time_date', Carbon::now('Asia/Manila')->format('F-d-Y - H:i:s'));
            Session::put('current_user', $user);
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            Session::put('user_type', $user->usertype);
            // Successful login
            return redirect('dashboard')->with('success', 'You have successfully created an account.');
        }
        }

    public function addNewStudentUser(Request $request): RedirectResponse
    {
        //VALIDATE THE VALUE OF SUBMITTED FORM
        $request->validate([
            'student_fullname' => 'required | regex:/^[a-zA-Z\s]+$/',
            'student_email'=>'required |max:50 | email',
            'student_password'=>'required | min:5 | max:16',
            'student_grade'=>'required',
            'student_section'=>'required | regex:/^[a-zA-Z\s]+$/',
        ]);

        $email = $request->input('student_email');
        $pword = $request->input('student_password');
        $grade = $request->input('student_grade');
        $section = $request->input('student_section');

        // dd($request);
        $checkUser = cadi_user::where('email', $email)->first();
        if($checkUser){
            return redirect('register')->with('failed', 'The email address is already taken');
        }else {
            $data = [
                'name' => $request->input('student_fullname'),
                'uname' => $email,
                'email' => $email,
                'pword' => $pword,
                'grade' => $grade,
                'section' => $section,
                'usertype' => 'student'
            ];
            cadi_user::create($data);
            $user = cadi_user::where('email', $email)
                ->where('pword', $pword)
                ->first();
            // Successful login
            return redirect('view-students')->with('success', 'You have successfully created a student account.');
        }
    
    }

    public  function  findUserToChangePass(Request $request){

        // Inside your function/method
        // Session::put('reset_email', $request->input('email'));
        Session::put('reset_otp_code', random_int(000000,999999));
        Session::put('otp_expiration', Carbon::now()->addSecond(180));
        Mail::to(Session::get('reset_email'))->send(new SendVerificationMailer());

        return view('new-password');
    }

    public function resetPassword(Request $request){
        $request->validate([
            'password'=>'required | min:5 | max:16 | confirmed',
            'password_confirmation' => 'required',
            'otp'=>'required'
        ]);
        $otp_expiration = Session::get('otp_expiration');
        if(Session::get('reset_otp_code') != $request->input('otp')){
            return redirect('new-password')->with('failed','The otp is invalid');

        }
        else if($otp_expiration < Carbon::now()){
            return redirect('new-password')->with('failed','The otp is expired');

        }
        else if(Session::get('reset_otp_code') == $request->input('otp')){
            $selectedUser = new cadi_user;
            $user = cadi_user::where('email', Session::get('reset_email'))
                ->where('is_active', 1)
                ->where('is_banned', 0)
                ->first();
        if($user){
            $user->pword = $request->input('password');
            $user->save();
        }else{
            return redirect('login')->with('failed','We can\'t seem to find that user');

        }
            return redirect('login')->with('success','You changed your password successfully');
        }else{
            return redirect('new-password')->with('failed','Invalid OTP code');

        }


    }
}
