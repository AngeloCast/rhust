<!-- DELETE EVENT-->

<div class="modal fade" id="delevent_<?=$row['id']?>">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>DELETE EVENT </b></h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
              <img class="modal-content" style="width: 100%; height: auto; max-height: 300px;" src="<?php echo BASE_URL . PUBLIC_DIR . '/images/' . $row['photo']; ?>">
              <form class="form-horizontal" method="POST" action="<?=site_url('admin/delete_event/'.$row['id']);?>">

                <h3 class="text-center">You are deleting <b><?=$row['title'];?></b></h3>
                <h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>