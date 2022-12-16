<!-- Add -->
<div class="modal fade" id="replyinquiry">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Compose Reply</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=site_url('admin/send_reply/'.$data[2]['id']);?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$data[2]['id']?>">
                <input type="hidden" name="email" value="<?=$data[2]['email']?>">
                <input type="hidden" name="firstname" value="<?=$data[2]['firstname']?>">
                <input type="hidden" name="lastname" value="<?=$data[2]['lastname']?>">
                <input type="hidden" name="subject" value="<?=$data[2]['subject']?>">
                <input type="hidden" name="message" value="<?=$data[2]['message']?>">
                <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">To: </label>

                    <div class="col-sm-5">
                      <label class="control-label"><?=$data[2]['firstname'] . ' ' . $data[2]['lastname'];?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Email: </label>

                    <div class="col-sm-5">
                      <label class="control-label"><?=$data[2]['email'];?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Subject:</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="subject" value="<?=$data[2]['subject'];?>" name="subject" required>
                    </div>
                </div>
                
                <div class="form-group">

                  <label for="message" class="col-sm-2 control-label">Message:</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="message" name="message" required></textarea>
                  </div>
                  
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Send <i class="fa fa-paper-plane"></i></button>
              </form>
            </div>
        </div>
    </div>
</div>


