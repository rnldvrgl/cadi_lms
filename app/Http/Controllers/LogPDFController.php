<?php

namespace App\Http\Controllers;

use App\Models\cadi_book;
use App\Models\cadi_borrowed_book_info;
use App\Models\cadi_log;
use App\Models\cadi_report;
use App\Models\cadi_user;
use App\Models\cadi_userlog;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogPDFController extends Controller
{
    public function checkReportType(Request $request){
        $requestType = $request->input('report_type');
        $startDate =$request->input('startDate');
        $endDate = $request->input('endDate');
        $request->validate([
            'report_type' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',

        ]);
        //        ddd($requestType);
        if ($requestType == 0){
            return $this->generateLogPDF($startDate, $endDate);
        }elseif ($requestType == 1){
            return $this->generateBookReportLogPDF($startDate, $endDate);
        }elseif ($requestType == 2){
            return $this->generateBorrowAndReturnPDF($startDate, $endDate);
        }elseif ($requestType == 3){
            return $this->generateMostBorrowPDF($startDate, $endDate);
        }elseif ($requestType == 4){
            return $this->generateStudentPDF($startDate, $endDate);
        }elseif ($requestType == 5){
            return $this->generateAllTransactionsPDF($startDate, $endDate);
        }elseif ($requestType == 6){
            return $this->generateUserLogPDF($startDate, $endDate);
        }
        else{
            return response("select report type first!!!!!!");
        }
    }
    public function generateBookReportLogPDF($startD, $endD){
        $startD = date('Y/m/d', strtotime($startD));
        $endD = date('Y/m/d', strtotime($endD));
        $AddReportId = new cadi_report();
        $AddReportId->report_name = "book";
        $AddReportId->save();
        $GetReportId = cadi_report::whereNotNull('report_id')
            ->orderBy('report_id', 'desc')
            ->first();
//        ddd("startd: $startD". "endD: $endD");
        $books = cadi_book::all();
    //    ddd($books);
        $data = [
            'title' => 'Log Reports',
            'footer' => '---Nothing follows---',
            'books' => $books->all(),
            'ReportId' => $GetReportId->report_id
        ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/logReports/displayBookReportPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "landscape");

        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('MCHS Library books reports.pdf');
    }
    public function generateLogPDF($startD, $endD){
    $startD = date('Y/m/d', strtotime($startD));
    $endD = date('Y/m/d', strtotime($endD));
    
    $AddReportId = new cadi_report();
    $AddReportId->report_name = "log";
    $AddReportId->save();
    
    $GetReportId = cadi_report::whereNotNull('report_id')
        ->orderBy('report_id', 'desc')
        ->first();

    $log_data = cadi_log::where('date_done', '>=', $startD)
        ->where('date_done', '<=', $endD)
        ->get();

    $data = [
        'title' => 'Log Reports',
        'footer' => '---Nothing follows---',
        'logs' => $log_data->all(),
        'ReportId' => $GetReportId->report_id
    ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/logReports/displayLogPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "portrait");

        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('MCHS Library log reports.pdf');
    }
    
    public function generateBorrowAndReturnPDF($startD, $endD){
        $transaction_info = DB::table("cadi_borrowed_book_infos as cbbi")
    ->where(function ($query) use ($startD, $endD) {
        $query->whereBetween('date_borrowed', [$startD, $endD])
            ->orWhereBetween('return_date', [$startD, $endD]);
    })
    ->join("cadi_users as cu", "cu.id", "=", "cbbi.user_id")
    ->join("cadi_books as cb", "cb.id", "=", "cbbi.book_id")
    ->select("cbbi.*", "cu.name", "cb.title")
    ->get();

        $AddReportId = new cadi_report();
        $AddReportId->report_name = "log";
        $AddReportId->save();
        $GetReportId = cadi_report::whereNotNull('report_id')
            ->orderBy('report_id', 'desc')
            ->first();
//        $log_data = cadi_borrowed_book_info::all();
        $data = [
            'title' => 'Borrow and Return Reports',
            'footer' => '---Nothing follows---',
            'borrow_logs' => $transaction_info->all(),
            'ReportId' => $GetReportId->report_id

        ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/logReports/displayBookLogPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "portrait");

        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('Books Borrowed Report.pdf');
    }

    public function generateMostBorrowPDF($startD, $endD){
        $mostBorrowedBooks = DB::table("cadi_borrowed_book_infos as cbbi")
            ->whereBetween('date_borrowed', [$startD, $endD])
            ->join("cadi_books as cb", "cb.id", "=", "cbbi.book_id")
            ->select("cb.title", DB::raw('count(*) as borrow_count'))
            ->groupBy('cb.title')
            ->orderByDesc('borrow_count')
            ->get();

        $AddReportId = new cadi_report();
        $AddReportId->report_name = "most_borrowed_books";
        $AddReportId->save();

        $GetReportId = cadi_report::whereNotNull('report_id')
            ->orderBy('report_id', 'desc')
            ->first();

        $data = [
            'title' => 'Most Borrowed Books Report',
            'footer' => '---Nothing follows---',
            'most_borrowed_books' => $mostBorrowedBooks->all(),
            'ReportId' => $GetReportId->report_id,
        ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/mostBorrowedBooks/displayMostBorrowedBooksPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "portrait");

        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('Most Borrowed Books Report.pdf');
    }

    function generateStudentPDF($startD, $endD){
        $students = cadi_user::where('usertype', 'student')->whereBetween('created_at', [$startD, $endD])->get();

        $AddReportId = new cadi_report();
        $AddReportId->report_name = "student_report";
        $AddReportId->save();

        $GetReportId = cadi_report::whereNotNull('report_id')
            ->orderBy('report_id', 'desc')
            ->first();

        $data = [
            'title' => 'Student Report',
            'footer' => '---Nothing follows---',
            'students' => $students->all(),
            'ReportId' => $GetReportId->report_id,
        ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/studentReport/displayStudentReportPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "portrait");

        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('Student Report.pdf');
    }

    function generateAllTransactionsPDF($startD, $endD){
        $transactions = cadi_borrowed_book_info::whereBetween('date_borrowed', [$startD, $endD])
        ->orWhereBetween('return_date', [$startD, $endD])
        ->get();

        $log_data = cadi_log::where('date_done', '>=', date('Y/m/d', strtotime($startD)))
        ->where('date_done', '<=', strtotime($endD))
        ->get();

        $AddReportId = new cadi_report();
        $AddReportId->report_name = "all_transactions";
        $AddReportId->save();
        
        $GetReportId = cadi_report::whereNotNull('report_id')
        ->orderBy('report_id', 'desc')
        ->first();
        
        $data = [
            'title' => 'All Transactions and Logs Report',
            'footer' => '---Nothing follows---',
            'transactions' => $transactions->all(),
            'logs' => $log_data->all(),
            'ReportId' => $GetReportId->report_id,
        ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/transactionsReport/allTransactionsPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "portrait");

        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('All Transactions Report.pdf');
    }

    function generateUserLogPDF($startD, $endD){
        $startD = date('Y/m/d', strtotime($startD));
        $endD = date('Y/m/d', strtotime($endD));
        $AddReportId = new cadi_report();
        $AddReportId->report_name = "book";
        $AddReportId->save();
        $GetReportId = cadi_report::whereNotNull('report_id')
            ->orderBy('report_id', 'desc')
            ->first();

        $user_logs = cadi_userlog::all();

        $data = [
            'title' => 'Log Reports',
            'footer' => '---Nothing follows---',
            'user_logs' => $user_logs->all(),
            'ReportId' => $GetReportId->report_id
        ];

        // Resolve an instance of the PDF class from the service container
        $pdf = app(PDF::class);
        // Load the Blade view and pass data
        $pdf->loadView('reports/userLogReports/displayUserLogsPDF', $data);

        // Set paper size and orientation
        $pdf->setPaper("A4", "portrait");
        
        // Render the PDF
        $pdf->render();

        // Return the PDF as a downloadable file
        return $pdf->stream('User Logs Report.pdf');
    }
}
