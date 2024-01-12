<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\MainDashboardController;
use App\Http\Controllers\LogPDFController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\QrScannerController;
use Illuminate\Http\Request;

use App\Models\cadi_book;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerificationMailer;
use PhpParser\Node\Stmt\Return_;

/*'['
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//PDF GENERATOR
Route::view('view-pdf', 'displayLogPDF')->middleware('isUSerLoggedIn');;
Route::post('log-reports', [LogPDFController::class,'checkReportType'])->middleware('isUSerLoggedIn');;
Route::get('log-reports', [LogPDFController::class,'checkReportType'])->middleware('isUSerLoggedIn');;
Route::get('reports', [LogsController::class, 'viewLogs'])->middleware('isUSerLoggedIn');;

//QRCODE GENERATOR
Route::get("generate-qr/{book_id}/{book_title}", [QrCodeController::class,'show']);

//QR SCANNER
Route::get('qr-scanner', [QrScannerController::class,'show']);
Route::get('qr-borrow', [QrScannerController::class,'showQrBorrowReader']);

//Route::get("/choose_action/book-id={id}", [BookBorrowController::class,'showBorrowBook']);
Route::get('/choose_action/book-id={id}', function ($id) {
    return view('choose_action',
    [
        "book_id"=>$id
    ]);
});

//END QRCODE GENERATOR

//NOTIFICATIONS
Route::post('notify-user', [BooksController::class,'addNotificationForOverdue']);

//END OF NOTIFICATIONS


//BORROW AND RETURN OF STUDENT
Route::get('return-requests',[bookBorrowController::class, 'showReturnPage'])->middleware('isUSerLoggedIn');;
Route::get('borrow-book',[bookBorrowController::class, 'showBorrowPage'])->middleware('isUSerLoggedIn');;

//});
Route::get("borrow-requests", [BooksController::class,'getAllTransactionInfo'])->middleware('isUSerLoggedIn');;
Route::post("delete-transaction", [BookBorrowController::class,'deleteTransaction']);

Route::get("view-transactions", [BooksController::class,'getAllTransactionInfo'])->middleware('isUSerLoggedIn');;
//END OF BORROW AND RETURN OF STUDENTS


//BORROW BOOKS
Route::get("/borrow-book/book-id={id}/user-id={userId}", [BookBorrowController::class,'showBorrowBook']);
Route::post('process-borrow', [BookBorrowController::class,'processBorrowBook']);
//END OF BORROW BOOK

//RETURN BOOK
Route::get("/return-book/book-id={id}/user-id={userId}", [BookBorrowController::class,'showReturnBook']);
Route::post('process-return', [BookBorrowController::class,'processReturnBook']);

//END OF RETURN BOOK

//MODALS ROUTES
Route::view('delete-book-modal', 'components/modals/delete_book');
Route::view('edit-book-modal', 'components/modals/edit_book');
Route::view('add-book-modal', 'components/modals/add_book');
Route::view('ban-student-modal', 'components/modals/ban_student');
Route::view('edit-student-modal', 'components/modals/edit_student');

Route::post('delete-book', [booksController::class,'deleteBook']);
Route::post('archive-book', [booksController::class,'archiveBooks']);
Route::post('unarchive-book', [booksController::class,'unarchiveBooks']);
Route::post('edit-book', [booksController::class,'editBooks']);
Route::post('add-book', [booksController::class,'addBooks']);
Route::post('ban-student', [AuthController::class,'banStudent']);
Route::post('edit-student', [AuthController::class,'editStudent']);
Route::post('delete-student', [AuthController::class,'deleteUser']);
Route::post('mark-paid',[BookBorrowController::class, 'markStudentPaid']);

//END OF MODALS ROUTE
// STUDENT ROUTES
Route::view('student-dashboard', 'student/components/new_book');
//END OF STUDENT ROUTES
//DASHBOARD SUB MENU
Route::get("view-books", [BooksController::class,'getAllBooks']);
Route::get("view-students", [AuthController::class,'getAllStudents'])->middleware('isUSerLoggedIn');;
//END OF DASHBOARD SUBMENU

Route::get('dashboard', [MainDashboardController::class,'getTotalAllCount'])->middleware('isUSerLoggedIn');
Route::view('test', 'test');
Route::view('blank', 'blank');

//MANAGE STUDENT
Route::post('archive-student', [AuthController::class,'archiveStudent']);
Route::post('unarchive-student', [AuthController::class,'unarchiveStudent']);
//END OF MANAGE STUDENT

Route::post('reset_password', [AuthController::class,'resetPassword']);
Route::get('forgot-password', function () {
    if(Session::has('current_user')){
        return redirect('dashboard');
    }else{
        return view('forgot-password');
    }
})->middleware('guest')->name('password.request');

// Route::get('re-new-password', function (){

//     return view('new-password')->with('failed','Invalid OTP code');
// });
//CHECKPOINT 
Route::get('new-password', [AuthController::class,'findUserToChangePass']);
Route::post('send-otp', function(Request $request){
    $request->validate([
        'email'=>'required | email | max:50',
    ]);
    Session::put('reset_email', $request->input('email'));
    return redirect('new-password');
});
// Route::post('new-password', [AuthController::class,'findUserToChangePass']);
Route::get('profile', [AuthController::class, 'showProfilePage']);

Route::view('side', 'components2/sidebar');
Route::view('noaccess', 'noaccess');
Route::view('success', 'components/success_failed_page');
//Route::view('new_book.blade.php', 'components2/books')->middleware('protectedPage');
//Route::view('new_book.blade.php', 'new_book.blade.php')->middleware('protectedPage');

//Route::get('/new_book.blade.php', [AuthController::class,'performAdminLogin'])->middleware('protectedPage');
Route::post('/adminLogin', [AuthController::class,'performLogin'])->middleware('throttle:10,5');

Route::get('/register2', function () {
    return redirect('register')->with('success', 'This is just a test warning!');
});
route::get('test-mail',function(){
    // Inside your function/method
    Session::put('reset_otp_code', random_int(000000,999999));
    Mail::to('aldwinnunag20@gmail.com')->send(new SendVerificationMailer());
});
Route::get('/register', function () {
    if(Session::has('current_user')){
        return redirect('dashboard');
    }else{
        return view('register');
    }

});

Route::get('/', function () {
        return redirect('login');

});

Route::get('/login', function () {
    //CHECK FIRST IF USER IS LOGGED IN IF "YES" THE USER WILL BE REDIRECTED TO DASHBOARD
    if(Session::has('current_user')){
        return redirect('dashboard');
    }else{
        return view('login',[
            'old'=>['email'=>'','password'=>'']
        ]);
    }
});

Route::get('/logout', function () {
    Session::flush();
    return redirect('login');
});
//Route::get('/books', function () {
//    $data = cadi_book::paginate(2);
//    return view('bookList', ['books'=> $data]);
//});Route::get("books", [BooksController::class,'getAllBooks']);


Route::post("users", [AuthController::class,'getData']);
Route::post("register_now", [AuthController::class,'addNewUser']);
Route::post("add-student", [AuthController::class,'addNewStudentUser']);
Route::post("upload-students", [AuthController::class,'addMultipleStudents']);


//For group middleware
//Route::group(['middleware'=>['protectedPage']], function (){
//    Route::view('new_book.blade.php', 'new_book.blade.php');
//});



Route::post('/new_password', [AuthController::class, 'new_password'])->name('new_password');

