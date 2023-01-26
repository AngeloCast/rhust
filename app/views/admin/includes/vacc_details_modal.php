
<!-- DELETE VACCINATION DETAILS -->
<input type="hidden" name="id" value="<?php echo $detail['id'];?>">
<input type="hidden" name="v_id" value="<?php echo $detail['v_id'];?>">
<h5 class="text-center">
  <b>You are deleting 
  <?php
    if($detail['vacc_info'] == 1){
      echo '1st Dose';
    }
    else if($detail['vacc_info'] == 2){
      echo '2nd Dose';
    }
    else if($detail['vacc_info'] == 3){
      echo '1st Booster';
    }
    else{
      echo '2nd Booster';
    }
  ?>
  </b>
</h5>
<br> 
<h6 class="text-center">DO YOU WANT TO CONTINUE?</h6>

