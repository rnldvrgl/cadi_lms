<!DOCTYPE html>
<html lang="en">
<head>
   <title>Borrow Book Form</title>
   @include("components/header")
</head>

<body class="bg-gradient-primary">
{{--{{ddd($borrow_info->available_count)}}--}}

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Return a Book</h1>
                            <p>Before proceeding, double-check the details...</p>
                        </div>
                        <form action="../../process-borrow" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="book-title">Book title</label>
                                    <input type="hidden" name="book_id" value="{{$borrow_info->id}}">
                                    <input type="hidden" name="user_id" value="{{$user_info->id}}">
                                    <input type="text" class="form-control form-control-user" id="book-title" name="book_title" placeholder="Book Title" value="{{$borrow_info->title}}" required readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="user-name">Your name</label>
                                    <input type="text" class="form-control form-control-user" id="user-name" name="user_name" placeholder="Your Name" value="{{$user_info->name}}" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="borrow-date">Borrow date</label>
                                <input type="text" class="form-control form-control-user" id="borrow-date" value="{{date("d/m/Y-H:i:s")}}" name="borrow_date" required readonly>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <input type="date" class="form-control form-control-user" id="return-date" name="return_date" required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="contact-email">Email</label>
                                <input type="email" class="form-control form-control-user" id="contact-email" name="contact_email" placeholder="Contact Email" value="{{$user_info->email}}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="contact-phone">Contact number</label>
                                <input type="tel" class="form-control form-control-user" id="contact-phone" name="contact_phone" placeholder="Contact Phone" required readonly>
                            </div>
                            <p>By clicking borrow you agree with our Terms and Conditions</p>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Return</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and other scripts -->
<!-- Note: You can link to Bootstrap JS scripts if needed -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
