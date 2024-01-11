<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Buttons</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center mb-4">
        <h2>What transaction are you going to make?</h2>
    </div>
    <div class="text-center">
        <a href="../borrow-book/book-id={{$book_id}}/user-id=1" class="btn btn-primary mb-2">Borrow</a>
        or
        <a class="btn btn-primary mb-2">Return</a>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
