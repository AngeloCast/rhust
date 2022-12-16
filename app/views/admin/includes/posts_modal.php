<!-- Add -->
<div class="modal fade" id="addnewpost">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Create new post</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=site_url('index/admin/announcements');?>" enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?=$_SESSION['userid'];?>">

                <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-4">
                      <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                    </div>

                    <label for="gender" class="col-sm-2 control-label">Category</label>

                    <div class="col-sm-3">
                      <select class="form-control" id="gender" name="gender" required>
                        <option value="" selected>Choose Category</option>
                        <option value="1">Announcement</option>
                        <option value="2">News&Activities</option>
                        <option value="3">Health FAQs</option>
                        <option value="4">Health Information</option>
                      </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Content</label>

                    <div class="col-sm-9">
                      <textarea id="editor1" class="form-control" id="lastname" name="lastname" required> </textarea>
                    </div>
                </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save as draft</button>
              </form>
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-publish"></i> Publish</button>
              </form>
            </div>
        </div>
    </div>
</div>


