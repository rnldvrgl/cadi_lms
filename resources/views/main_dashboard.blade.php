<!DOCTYPE html>
<html lang="en">

<head>
    @include('components/header')

    <title>LMS Dashboard</title>
    @include('components.modals.SuccessModal')
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  @include('components.sidebars.main_dash_sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include("components.navbar.main_dash_navbar")
            @include('components/logout')

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @if($penalty > 0)
                    <div class="alert alert-danger text-center" role="alert">
                        You have 15 pesos penalty please pay it immediately
                    </div>
                @endif
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    <span class="text">Last login attempt: {{Session::get('last_login_time_date')}}</span>
                    @if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')
                        <a href="reports" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Reports</a>
                    @endif
                </div>

                <!-- BOOKS CARD GROUP-->
                <div class="row">

                    <!--TOTAL BOOKS CARD-->
                    @if(Session::get('user_type') == 'admin' || Session::get('user_type') == 'librarian')

                        <div href="view-books" id="totalBooksCard" class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total books
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book-open fa-2x" style="color: rgba(78,114,222,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- RETURNED BOOKS CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Available Books
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAvailableBooks }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x" style="color: rgba(28,199,137,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BORROWED BOOKS CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Borrowed
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div
                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalBorrowedBooks }}</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x"
                                               style="color: rgba(54,184,203,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ARCHIVED BOOKS CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Archived
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalArchivedBooks }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-archive fa-2x" style="color: rgba(229,74,59,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- STUDENTS CARD GROUP -->
                    <div class="row">
                        <!--TOTAL STUDENTS CARD-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Students
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStudents }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x" style="color: rgba(78,114,222,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVE STUDENT CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Active students
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalActiveStudents }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-check fa-2x" style="color: rgba(42,202,144,0.4);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- INACTIVE STUDENT CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Inactive
                                                Students
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div
                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalInactiveStudents }}</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x" style="color: rgba(244,193,62,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BANNED STUDENT CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Banned students
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBannedStudents }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-slash fa-2x" style="color: rgba(231,85,71,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- OVERDUE BOOKS CARD -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Overdue
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $overdue }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x" style="color: rgba(229,74,59,0.42);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
{{--                --}}{{--    End of frequently borrowed and returned books--}}
{{--                @if($recent_books == [])--}}
{{--                    <h5>No Frequently Borrowed Books</h5>--}}
{{--                @else--}}
{{--                    <h1>Frequently Borrowed Books</h1>--}}
{{--                @endif--}}
{{--                <!-- Content Row -->--}}
{{--                <div class="row">--}}
{{--                    @foreach($recent_books as $recent_book)--}}

{{--                        <div class="col-lg-6 mb-4">--}}
{{--                            <!-- Illustrations -->--}}
{{--                            <div class="card shadow mb-4">--}}
{{--                                <div class="card-header py-3">--}}
{{--                                    <h6 class="m-0 font-weight-bold text-primary">{{$recent_book->title}}</h6>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="text-center">--}}
{{--                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"--}}
{{--                                             src="img/elfili.png" alt="...">--}}
{{--                                    </div>--}}
{{--                                    <p>Add some quality, svg illustrations to your project courtesy of a--}}
{{--                                        constantly updated collection of beautiful svg images that you can use--}}
{{--                                        completely free and without attribution!</p>--}}
{{--                                    <a href="#">Borrow this book</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                @if($recent_books)
                    <h3>LATEST BOOKS</h3>
                @endif
                <!-- Content Row -->
                <div class="row">
                    @foreach($recent_books as $recent_book)
                        <div class="col-lg-6 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{$recent_book->title}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                             src="img/elfili.png" alt="...">
                                    </div>
                                    <div style="text-align: center">
                                        <p><strong>Author:</strong> {{$recent_book->author}}</p>
                                        <p><strong>Copyright:</strong> {{$recent_book->copyright}}</p>
                                        <p><strong>Publisher:</strong> {{$recent_book->publisher}}</p>
                                        <p><strong>Place of Publication:</strong> {{$recent_book->place_of_publication}}</p>
{{--                                    <a href="#">Borrow this book</a>--}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach


                </div>
            </div>
            {{--    End of frequently borrowed and returned books--}}


        </div>
        <!-- /.container-fluid -->
{{--        @include('QrCode.Qr-Reader_borrow')--}}
        @include('QrCode.Qr-Reader_return')

    </div>
    <!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



@include('components.footer')


</body>

</html>
