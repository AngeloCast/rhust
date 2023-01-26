
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title"><b>DELETE 
    <?php 
      if($record['category'] == 1) { echo 'ANNOUNCEMENT';} 
      elseif($record['category'] == 2) { echo 'NEWS & ACTIVITIES';}
      elseif($record['category'] == 3) { echo 'HEALTH FAQ';}
      else{ echo 'HEALTH INFORMATION';}
    ?>  
  </b></h4>
</div>
<form class="form-horizontal" method="POST" action="<?=site_url('admin/delete_post');?>">
<div class="modal-body post_modal" style="padding: 30px;">
    <input type="hidden" name="category" value="<?php echo $record['category'];?>">
    <input type="hidden" name="id" value="<?php echo $record['id'];?>">
    <h3 class="text-center">You are deleting <b><?php echo $record['title'];?></b></h3>
    <h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>
</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm Delete</button>
  </form>
</div>
