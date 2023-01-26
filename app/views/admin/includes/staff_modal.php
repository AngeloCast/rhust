<!-- Add -->
<div class="modal fade" id="addnewstaff">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Staff</b></h4>
            </div>
            <div class="modal-body" style="padding: 20px 40px 20px 40px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('admin/insert_staff');?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-6">
                      <label for="photo" class="control-label">Staff Photo</label>
                      <input class="form-control" accept="image/*" type="file" id="fileToUpload" name="fileToUpload">
                    </div>
                </div>
                <hr>
                <div class="form-group">

                    <div class="col-sm-12">
                      <label for="fullname" class="control-label">Full name</label>
                      <input type="text" class="form-control" id="fullname" name="fullname" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    
                  <div class="col-sm-4">
                    <label for="birthday" class="control-label">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                  </div>

                  <div class="col-sm-3">
                    <label for="gender" class="control-label">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                      <option value="" disabled selected>Choose</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>

                  <div class="col-sm-5">
                    <label for="cnumber" class="control-label">Contact Number</label>
                    <input type="text" placeholder="Enter 10 digit number" class="form-control" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit number" id="cnumber" name="cnumber" required>
                  </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-5">
                      <label for="email" class="control-label">Email</label>
                      <input type="email" placeholder="Enter email" class="form-control" id="email" name="email" required>
                    </div>
                
                    <div class="col-sm-7">
                      <label for="address" class="control-label">Address</label>
                      <input type="address"  placeholder="Barangay, Municipality" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <hr>
                <div class="form-group">

                    <div class="col-sm-6">
                      <label for="position" class="control-label">Position</label>
                      <input type="text" placeholder="Enter Staff Position" class="form-control" id="position" name="position" required>
                    </div>

                    <div class="col-sm-6">
                      <label for="password" class="control-label">Set Password <i class="fa fa-key"></i></label>
                      <input type="password" placeholder="Password (9 characters minimum)" minlength="9" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 9 or more characters" class="form-control" id="password" name="password" required>
                    </div>
                
                </div>
                

                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>


