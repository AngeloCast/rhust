<!-- DELETE VACCINATION-->

<div class="modal fade" id="delModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h6 class="modal-title" style="font-size: 14px;"><b>VACCINATION DETAILS <i class="fa fa-info-circle"></i></b></h6>
        </div>
        <form class="form-horizontal" method="POST" action="<?=site_url('vaccination/delete_vacc_detail')?>">
        <div class="modal-body vacc_detail" style="padding: 30px;">

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
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h6 class="modal-title" style="font-size: 14px;"><b>EDIT VACCINATION DETAILS <i class="fa fa-info-circle"></i></b></h6>
        </div>
        <form class="form-horizontal" method="POST" action="<?=site_url('vaccination/update_vaccination_dose')?>">
        <div class="modal-body vacc_edit_detail" style="padding: 20px 30px 0px 30px;">

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> Save Changes</button>
            </form>
        </div>
    </div>
  </div>
</div>


<!-- ADD VACCINATION DOSE -->

<div class="modal fade" id="add_vacc_dose" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>NEW VACCINATION DOSE</b></h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('vaccination/add_vaccination_dose');?>">
                <input type="hidden" name="id" value="<?=$data[2]['id']; ?>">
                <div class="form-group">
                    <div class="col-sm-12">
                      <label for="vaccination_info" class="control-label">Vaccination Information</label>
                      <select class="form-control" name="vaccination_info">
                        <option value="1">1st Dose</option>
                        <option value="2">2nd Dose</option>
                        <option value="3">1st Booster</option>
                        <option value="4">2nd Booster</option>
                      </select>
                    </div>

                    <div class="col-sm-12">
                      <label for="vaccinator" class="control-label">Vaccinator Name</label>
                      <input type="text" class="form-control" name="vaccinator">
                    </div>

                    <div class="col-sm-12">
                      <label for="vaccination_date" class="control-label">Date of Vaccination</label>
                      <input type="date" class="form-control" name="vaccination_date">
                    </div>

                    <div class="col-sm-12">
                      <label for="lot_number" class="control-label">Lot Number</label>
                      <input type="text" class="form-control" name="lot_number">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- DELETE VACCINATION-->

<div class="modal fade" id="delvaccrecord">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>DELETE VACCINATION RECORD</b></h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('vaccination/delete_vaccinationrecord');?>">
                <input type="hidden" name="id" value="<?=$data[2]['id'];?>">
                <h3 class="text-center">You are deleting <b><?=$data[2]['firstname'] . ' ' . $data[2]['lastname'];?>'s</b> record.</h3>
                <h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>