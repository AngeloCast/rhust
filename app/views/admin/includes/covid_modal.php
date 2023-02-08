<!-- Add -->
<div class="modal fade" id="addnewpatient">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Patient</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=site_url('index/admin/covid');?>" enctype="multipart/form-data">
                <input type="hidden" name="usertype" value="1">
           
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mid_initial" class="col-sm-3 control-label">mid_initial</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="mid_initial" name="mid_initial" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-sm-3 control-label">Birthday</label>

                    <div class="col-sm-5">
                      <input type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Suffix" class="col-sm-3 control-label">Suffix</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="Suffix" name="Suffix" required>
                    </div>
                </div>
                <div class="form-group">

                  <label for="age" class="col-sm-3 control-label">Age</label>

                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="age" name="age" required>
                  </div>


                  <label for="gender" class="col-sm-3 control-label">Gender</label>

                  <div class="col-sm-3">
                    <select class="form-control" id="gender" name="gender" required>
                      <option value="" selected>Choose</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>

                  
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cnumber" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-5">
                      <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-5">
                      <input type="address" class="form-control" id="address" name="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Result" class="col-sm-3 control-label">Result</label>

                    <div class="col-sm-5">
                      <input type="Result" class="form-control" id="Result" name="Result" required>
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


