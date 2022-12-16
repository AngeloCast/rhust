<!-- Add -->
<div class="modal fade" id="addnewstaff">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Staff</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=site_url('index/admin/staff');?>" enctype="multipart/form-data">
                <input type="hidden" name="usertype" value="1">
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">Firstname</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                
                    <label for="lastname" class="col-sm-2 control-label">Lastname</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-sm-2 control-label">Position</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="position" name="position" required>
                    </div>

                    <label for="birthday" class="col-sm-2 control-label">Birthday</label>

                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>
                </div>
                
                <div class="form-group">

                  <label for="age" class="col-sm-2 control-label">Age</label>

                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="age" name="age" required>
                  </div>


                  <label for="gender" class="col-sm-2 control-label">Gender</label>

                  <div class="col-sm-4">
                    <select class="form-control" id="gender" name="gender" required>
                      <option value="" selected>Choose</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>

                  
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-4">
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                
                    <label for="cnumber" class="col-sm-2 control-label">Contact Info</label>

                    <div class="col-sm-4">
                      <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-4">
                      <input type="address" class="form-control" id="address" name="address" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-4">
                      <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
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


