<!-- Add Book Modal -->

@include('components/header')
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-left-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookModalLabel">Add a New Book</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="add-book">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_access_no">Accesson number</label>
                                    <input type="text" class="form-control" id="id_access_no" name="add_access_no" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_title">Title</label>
                                    <input type="text" class="form-control" id="id_title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_author">Author</label>
                                    <input type="text" class="form-control" id="id_author" name="author" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_available_count">Available</label>
                                    <input type="text" class="form-control" id="id_available_count" name="available_count">
                                </div>
                                <!-- Other form fields go here -->
                            </div>
                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_publication_place">Publication Place</label>
                                    <input type="text" class="form-control" id="id_publication_place" name="add_publication_place">
                                </div>
                                <div class="form-group">
                                    <label for="id_publisher">Publisher</label>
                                    <input type="text" class="form-control" id="id_publisher" name="publisher">
                                </div>
                                <div class="form-group">
                                    <label for="id_copyright">Copyright</label>
{{--                                    <input type="text" class="form-control" id="id_copyright" name="copyright">--}}
                                    <select name="copyright" class="form-control">
                                        @for($i=1990; $i<=2023; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_borrowed_count">Borrowed</label>
                                    <input type="text" class="form-control" id="id_borrowed_count" name="borrowed_count">
                                </div>
                                <div class="form-group">
                                    <label for="id_num_copies">No. of Copies</label>
                                    <input type="text" class="form-control" id="id_num_copies" name="num_copies">
                                </div>
                                <!-- Other form fields go here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
