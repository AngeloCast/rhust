<!-- Add -->
<div class="modal fade" id="addnewpatient">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <button type="button" style="color: white; opacity: 1;" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><i class="fa fa-file-alt"></i> New COVID19 Record</b></h4>
            </div>
            <div class="modal-body"  style="padding: 30px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('admin/covid_records');?>" enctype="multipart/form-data">
                <input type="hidden" name="usertype" value="1">
                <div class="form-group">

                    <div class="col-sm-4">
                      <label for="firstname" class="control-label">First Name</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>

                    <div class="col-sm-4">
                      <label for="lastname" class=" control-label">Last Name</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                
                    
                    <div class="col-sm-2">
                      <label for="middle_initial" class="control-label">M.I.</label>
                      <input type="text" class="form-control" id="mid_initial" name="mid_initial" required>
                    </div>

                    <div class="col-sm-2">
                      <label for="suffix" class="control-label">Suffix</label>
                      <input type="text" class="form-control" id="suffix" name="suffix">
                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-4">
                      <label for="birthday" class="control-label">Birthday</label>
                      <input type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>

                    <div class="col-sm-2">
                      <label for="age" class="control-label">Age</label>
                      <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                  
                    <div class="col-sm-2">
                    <label for="gender" class="control-label">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                      <option value="" selected>Choose</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="Other">Other</option>
                    </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    
                    <div class="col-sm-4">
                      <label for="address" class="control-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="col-sm-4">
                      <label for="cnumber" class="control-label">Contact Number</label>
                      <input type="text" class="form-control" id="cnumber" name="cnumber" pattern="[0-9]{10}" title="Enter 10 digit number" required>
                    </div>
                  
                    <div class="col-sm-4">
                      <label for="email" class="control-label">Email</label>
                      <input type="email" class="form-control" id="emailemail" name="email" required>
                    </div>

                    
                </div>
                <hr>
                
                <div class="form-group">
                    
                    <div class="col-sm-4">
                      <label for="medical_history" class="control-label">Variant</label>
                      <input type="text" class="form-control" id="variant" name="variant" required>
                    </div>

                    <div class="col-sm-4">
                      <label for="email" class="control-label">Tested by</label>
                      <input type="text" class="form-control" id="tested_by" name="tested_by" required>
                    </div>

                    <div class="col-sm-4">
                      <label for="date_created" class="control-label">Date Tested</label>
                      <input type="date" class="form-control" id="date_created" name="date_created" required>
                    </div>

                </div>
                


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
              <button type="reset" class="btn btn-default"><i class="fas fa-eraser"></i> Clear Form</button>
              </form>
            </div>
        </div>
    </div>
</div>






