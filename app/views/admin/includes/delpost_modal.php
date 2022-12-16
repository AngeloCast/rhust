<!-- DELETE COVID-->

<div class="modal fade" id="delpost_<?=$row['id']?>">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>DELETE 
                <?php 
                  if($row['category'] == 1) { echo 'ANNOUNCEMENT';} 
                  elseif($row['category'] == 2) { echo 'NEWS & ACTIVITIES';}
                  elseif($row['category'] == 3) { echo 'HEALTH FAQs';}
                  else{ echo 'HEALTH INFORMATION';}
                ?>  
              </b></h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
              <form class="form-horizontal" method="POST" action="<?=site_url('admin/delete_post/'.$row['id']);?>">
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