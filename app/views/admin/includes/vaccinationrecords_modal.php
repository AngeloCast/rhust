<!-- Add -->
<div class="modal fade" id="newvaccinationrecords">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <button type="button" style="color: white; opacity: 1;" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><i class="fa fa-file-alt"></i> New Vaccination Record</b></h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('admin/vaccination_records');?>" enctype="multipart/form-data">
                
                <div class="form-group">
                    

                    <div class="col-sm-4">
                      <label for="firstname" class="control-label">First Name</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>

                    

                    <div class="col-sm-4">
                      <label for="lastname" class="control-label">Last Name</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                
                    

                    <div class="col-sm-2">
                      <label for="mid_initial" class="control-label">Middle Initial</label>
                      <input type="text" class="form-control" id="mid_initial" name="mid_initial" required>
                    </div>
                
                    
                    <div class="col-sm-2">
                      <label for="suffix" class="control-label">Suffix</label>
                      <input type="text" class="form-control" id="suffix" name="suffix">
                    </div>
                </div>
                 <div class="form-group">

                    <div class="col-sm-4">
                      <label for="address" class="control-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                  
                    <div class="col-sm-4">
                      <label for="cnumber" class="control-label">Contact Number</label>
                      <input type="text" class="form-control" id="cnumber" name="cnumber" required>
                    </div>
                </div>
                <hr>
                 <div class="form-group"> 

                    <div class="col-sm-3">
                      <label for="phealth_num" class="control-label">PHealth Number</label>
                      <input type="number" class="form-control" id="phealth_num" name="phealth_num" required>
                    </div>

                    <div class="col-sm-3">
                      <label for="category" class="control-label">Category</label>
                      <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                

                    <div class="col-sm-3">
                      <label for="health_facility" class="control-label">Health Facility</label>
                      <input type="text" class="form-control" id="health_facility" name="health_facility" required>
                    </div>
                
                    <div class="col-sm-3">
                      <label for="hf_number" class="control-label">HF Number</label>
                      <input type="number" class="form-control" id="hf_number" name="hf_number" required>
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


