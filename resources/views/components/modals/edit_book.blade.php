<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-left-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit book information</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="edit-book">
                    @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" id="idToEdit" name="idToEdit">
                                    <label for="id">Accesson number</label>
                                    <input type="text" class="form-control" id="access_no" name="access_no">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">

                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author">
                                </div>
                                <div class="form-group">
                                    <label for="author">Available</label>
                                    <input type="text" class="form-control" id="available_count" name="available_count">
                                </div>
                                <!-- Other form fields go here -->
                            </div>
                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="publication_place">Publication Place</label>
                                    <input type="text" class="form-control" id="publication_place" name="publication_place">

                                </div>
                                <div class="form-group">
                                    <label for="publisher">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher">
                                </div>
                                <div class="form-group">
                                    <label for="copyright">Copyright</label>
                                    <input type="text" class="form-control" id="copyright" name="copyright">
                                </div>
                                <div class="form-group">
                                    <label for="author">Borrowed</label>
                                    <input type="text" class="form-control" id="borrowed_count" name="borrowed_count">
                                </div>
                                <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <label for="id">No. of Copies</label>
                                <input type="text" class="form-control" id="num_copies" name="num_copies">
                            </div>
                                <!-- Other form fields go here -->
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="saveChangesBtn" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>
    </div>
</div>
