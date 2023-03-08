
<!-- POBLACION MODAL -->
<div class="modal fade" id="chart_poblacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-line-chart"></i>PATIENT RECORDS IN POBLACION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body barangay_modal" style="padding: 40px;">
      <div class="row" style="margin-bottom: 20px; background-color: #d5d5d596; padding: 15px;">
        <div class="col-sm-12 text-center">
          <h4 class="modal-title"><b>PATIENT DEMOGRAPHICS</b></h4>
        </div>
      </div> 
             <div class="row" style="border: solid 1px dimgray; border-radius: 5px; padding-bottom: 20px;">
                <div class="col-sm-12">
                  <h6 class="modal-title text-center" style="margin-top: 10px;"><b>GENDER GROUP</b></h6>
                </div>
                  <div class="col-sm-4" style="margin-top: 20px;">
                    <!-- small box -->
                      <div class="small-box male_box">
                        <div class="inner">
                          <b>Male Patients</b>
                        </div>
                        <div class="icon">
                          <i class="fa fa-male" style="color: #025252; font-size: 50px;"></i>
                          
                          <b style="font-size: 30px"><?php  echo $data[13]['poblacionmale']['mrow']; ?></b>
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
                          
                          <b style="font-size: 30px"><?php  echo $data[13]['poblacionfemale']['frow']; ?></b>
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
                          <b style="font-size: 30px"><?php  echo $data[13]['poblacionother']['orow']; ?></b>
                        </div>
                      </div>
                  </div>
                </div>
                <br>
                <!-- SAKIT GROUP -->
                <div class="row">
                      <div class="col-sm-6" style="border: solid 1px dimgray; border-radius: 5px; padding: 10px;">
                        <div class="card">
                          <div class="card-header text-center">
                            <b>AGE GROUP</b>
                          </div>
                          <div class="card-body">
                            <canvas id="piepoblacion"></canvas>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-6" style="border: solid 1px dimgray; border-radius: 5px; padding: 10px;">
                        <div class="card">
                            <div class="card-header text-center">
                              <b>HEALTH DISEASE | CLASSIFICATION</b>
                            </div>
                            <div class="card-body">
                              <canvas id="chartpoblacion"></canvas>
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