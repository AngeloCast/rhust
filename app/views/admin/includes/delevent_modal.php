<!-- DELETE EVENT-->
<input type="hidden" name="id" value="<?php echo $record['id'];?>">
<img class="modal-content" style="width: 100%; height: auto; max-height: 300px;" src="<?php echo BASE_URL . PUBLIC_DIR . '/images/' . $record['photo']; ?>">
<h3 class="text-center">You are deleting <b><?php echo $record['title'];?></b></h3>
<h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>