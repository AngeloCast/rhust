
<!-- DELETE VACCINATION DETAILS -->
<input type="hidden" name="id" value="<?php echo $edit['id'];?>">
<input type="hidden" name="v_id" value="<?php echo $edit['v_id'];?>">
<div class="form-group">
  <div class="col-sm-12">
    <label for="vaccination_info" class="control-label">Vaccination Information</label>
    <select class="form-control" name="vaccination_info">
      <?php
        if($edit['vacc_info'] == 1){
          echo '<option value="1" selected>1st Dose</option>
                <option value="2">2nd Dose</option>
                <option value="3">1st Booster</option>
                <option value="4">2nd Booster</option>';
        }
        else if($edit['vacc_info'] == 2){
          echo '<option value="1">1st Dose</option>
                <option value="2" selected>2nd Dose</option>
                <option value="3">1st Booster</option>
                <option value="4">2nd Booster</option>';
        }
        else if($edit['vacc_info'] == 3){
          echo '<option value="1">1st Dose</option>
                <option value="2">2nd Dose</option>
                <option value="3" selected>1st Booster</option>
                <option value="4">2nd Booster</option>';
        }
        else{
          echo '<option value="1">1st Dose</option>
                <option value="2">2nd Dose</option>
                <option value="3">1st Booster</option>
                <option value="4" selected>2nd Booster</option>';
        }
      ?>
      
    </select>
  </div>

  <div class="col-sm-12">
    <label for="vaccinator" class="control-label">Vaccinator Name</label>
    <input type="text" class="form-control" name="vaccinator" value="<?php echo $edit['vaccinator'];?>">
  </div>

  <div class="col-sm-12">
    <label for="vaccination_date" class="control-label">Date of Vaccination</label>
    <input type="date" class="form-control" name="date" value="<?php echo $edit['date'];?>">
  </div>

  <div class="col-sm-12">
    <label for="lot_number" class="control-label">Lot Number</label>
    <input type="text" class="form-control" name="lot_number" value="<?php echo $edit['lot_number'];?>">
  </div>
</div>
<br> 

