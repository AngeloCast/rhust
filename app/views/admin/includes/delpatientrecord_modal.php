<!-- DELETE PATIENT RECORD -->

<div class="modal fade" id="delpatientrecords_<?=$row['id']?>">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>DELETE PATIENT RECORD</b></h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('patient/delete_patient_record/'.$row['id']);?>">
                <h3 class="text-center">You are deleting <b><?=$row['firstname'] . ' ' . $row['lastname'];?>'s</b> record.</h3>
                <h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

