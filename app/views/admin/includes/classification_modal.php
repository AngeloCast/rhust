  <!-- ADD CLASSIFICATION-->

  <div class="modal fade" id="addnew" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h6 class="modal-title" style="font-size: 14px;"><b><i class="fa fa-plus"></i> ADD NEW HEALTH DISEASE/ASSESSMENT/CLASSIFICATION</b></h6>
          </div>
          <form class="form-horizontal" method="POST" action="<?=site_url('patient/insert_class')?>">
          <div class="modal-body" style="padding: 20px 30px 0px 30px;">
            <label for="name" class="control-label">Health Disease/Assessment/Classification Name:</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> Save</button>
              </form>
          </div>
      </div>
    </div>
  </div>

  <!-- DELETE CLASSIFICATION-->

  <div class="modal fade" id="delModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h6 class="modal-title" style="font-size: 14px;"><b><i class="fa fa-trash"></i> DELETE HEALTH DISEASE/ASSESSMENT/CLASSIFICATION</b></h6>
          </div>
          <form class="form-horizontal" method="POST" action="<?=site_url('patient/delete_class')?>">
          <div class="modal-body del_class" style="padding: 30px;">

          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm</button>
              </form>
          </div>
      </div>
    </div>
  </div>


  <!-- EDIT VACCINATION-->

  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h6 class="modal-title" style="font-size: 14px;"><b><i class="fa fa-edit"></i> EDIT HEALTH DISEASE/ASSESSMENT/CLASSIFICIATION</b></h6>
          </div>
          <form class="form-horizontal" method="POST" action="<?=site_url('patient/update_class_name')?>">
          <div class="modal-body edit_class" style="padding: 20px 30px 0px 30px;">

          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> Save Changes</button>
              </form>
          </div>
      </div>
    </div>
  </div>
