<!-- BigaanModal -->
<div class="modal fade" id="chart_<?=$row?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-line-chart"></i>DATA VISUALIZATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 40px;">
      	<div class="row">
      		<div class="col-sm-12 mb-2" style="padding: 20px; border: 1px solid black;">
      			<h6 class="text-center"><b>MONTHLY RECORDS IN <?=strtoupper($row);?></b></h6>
      			<canvas id="mylineChart<?=$row?>"></canvas>
      		</div>
      	</div>
        <div class="row">
      		<div class="col-sm-6 mb-2" style="padding: 20px; border: 1px solid black;">
      			<h6 class="text-center"><b>AGE DEMOGRAPHIC</b></h6>
      			<canvas id="mydoughChart<?=$row?>"></canvas>
      		</div>

      		<div class="col-sm-6 mb-2" style="padding: 20px; border: 1px solid black;">
      			<h6 class="text-center"><b>HEALTH DISEASE | CLASSIFICATION</b></h6>
      			<canvas id="myPieChart<?=$row?>"></canvas>
      		</div>
      	</div>		      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>