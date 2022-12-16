<!-- ANNOUNCEMENT DETAILS-->

<div class="modal fade" id="details_<?=$data[2]['id']?>">
    <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
              <h6 class="modal-title text-light" style="font-size: 14px;"><b>ANNOUNCEMENT DETAILS <i class="fa fa-info-circle"></i></b></h6>
              <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body" style="padding: 30px;">
                <h5 class="text-center"><b><?=$data[2]['title'];?></b></h5>
                <br> 
                <div class="container p-3 border">
                    <h6 class="text-left"><?=$data[2]['content'];?></h6>
                </div>
            </div>
        </div>
    </div>
</div>