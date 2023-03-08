
<!-- tacligan MODAL -->
<div class="modal fade" id="chart_tacligan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-line-chart"></i>PATIENT RECORDS IN TACLIGAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body barangay_modal" style="padding: 40px;">
      <h4 class="modal-title text-center" style="margin-bottom: 20px;"><b>PATIENT DEMOGRAPHICS</b></h4>
             <div class="row" style="border: solid 1px dimgray; border-radius: 5px; padding-bottom: 20px;">
                <div class="col-sm-12">
                
                </div>
                  <div class="col-sm-4" style="margin-top: 20px;">
                    <!-- small box -->
                      <div class="small-box male_box">
                        <div class="inner">
                          <b>Male Patients</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-male" style="color: #025252; font-size: 50px;"></i>
                          <?php 
                            
                          ?>
                          <b style="font-size: 30px"><?php  echo $data[13]['tacliganmale']['mrow']; ?></b>
                        </div>
                      </div>
                  </div>

                  <div class="col-sm-4" style="margin-top: 20px;">
                    <!-- small box -->
                      <div class="small-box female_box">
                        <div class="inner">
                          <b>Female Patients</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-female" style="color: #b9352b; font-size: 50px;"></i>
                          
                          <b style="font-size: 30px"><?php  echo $data[13]['tacliganfemale']['frow']; ?></b>
                        </div>
                      </div>
                  </div>

                  <div class="col-sm-4" style="margin-top: 20px;">
                    <!-- small box -->
                      <div class="small-box other_box">
                        <div class="inner">
                          <b>Other</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-question-circle" style="color: #8d6900; font-size: 50px;"></i>
                          <?php 
                            
                          ?>
                          <b style="font-size: 30px"><?php  echo $data[13]['tacliganother']['orow']; ?></b>
                        </div>
                      </div>
                  </div>
                </div>
                <br>
                <!-- SAKIT GROUP -->
                <div class="row">
                      <div class="col-sm-5" style="border: solid 1px dimgray; border-radius: 5px; padding: 10px;">
                        <div class="card">
                          <div class="card-header text-center">
                            <b>AGE GROUP</b>
                          </div>
                          <div class="card-body">
                            <canvas id="pietacligan"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-1">
                      </div>
                      <div class="col-sm-6" style="border: solid 1px dimgray; border-radius: 5px; padding: 10px;">
                        <div class="card">
                            <div class="card-header text-center">
                              <b>HEALTH DISEASE | CLASSIFICATIONs</b>
                            </div>
                            <div class="card-body">
                              <canvas id="charttacligan"></canvas>
                            </div>
                        </div>
                      </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>