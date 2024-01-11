<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


<h1>books list</h1>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Book title</th>
        <th>Book author</th>
        <th>Published date</th>
        <th>Date recieved</th>
        <th>Is barrowed</th>

    </tr>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->book_title}}</td>
            <td>{{$book->book_author}}</td>
            <td>{{$book->book_date_published}}</td>
            <td>{{$book->date_receive}}</td>
                <?php $isBarrowed = $book->is_barrowed? "Barrowed": "Available" ?>
            <td>{{$isBarrowed}}</td>
        </tr>
    @endforeach
</table>
<span>
    {{ $books->links() }}
</span>
<style>
    .w-5{
        display: none;
    }
</style>

