<!-- Edit Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-left-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModal">Edit student information</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="edit-student">
                    @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" id="studentIdToEdit" name="studentIdToEdit">
                                    <label for="edit_name">Name</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name">
                                </div>
                                <div class="form-group">
                                    <label for="edit_email">Email</label>
                                    <input type="text" class="form-control" id="edit_email" name="edit_email">
                                    <hr>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="flexSwitchCheckChecked" checked>
                                        <label class="custom-control-label" for="flexSwitchCheckChecked">Active Status</label>
                                    </div>


                                </div>
                                <!-- Other form fields go here -->
                            </div>
                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="form-group" style="display: none">
                                    <label for="edit_active">Active status</label>
                                    <input type="text" class="form-control" id="edit_active" name="edit_active">
                                </div>

{{--                                <div class="form-check form-switch">--}}
{{--                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>--}}
{{--                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>--}}
{{--                                </div>--}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {

                                        var checkbox = document.getElementById('flexSwitchCheckChecked');
                                        if(document.getElementById('edit_active').value == 1){
                                            checkbox.checked = true;
                                        }else {
                                            checkbox.checked = false;
                                        }
                                    });

                                    function getActiveValue(){
                                        // Get the checkbox element by its ID
                                        var checkbox = document.getElementById('flexSwitchCheckChecked');
                                        // Get the value of the checkbox
                                        var checkboxValue = checkbox.checked;
                                        // Log the value to the console
                                        if(checkboxValue === true){
                                            document.getElementById('edit_active').value = 1;
                                        }else{
                                            document.getElementById('edit_active').value = 0;
                                        }

                                    }
                                </script>

                                <div class="form-group" style="display: none">
                                    <label for="edit_banned">Banned</label>
                                    <input type="text" class="form-control" id="edit_banned" name="edit_banned">
                                </div>
                                <div class="form-group">
                            </div>
                                <!-- Other form fields go here -->
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" onclick="getActiveValue()" id="saveChangesBtn" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>
    </div>
</div>
