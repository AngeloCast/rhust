<?php include 'includes/header.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
<style type="text/css">

</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<button onclick="window.print();"> Print </button>
    	<button id="button">Generate PDF</button>
    	<button id="print" onclick="printContent('makepdf');" >Print</button>
    	<input type="button" value="Print Div" onclick="PrintElem('#makepdf')" />
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Preview</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	<?php include 'includes/message.php'; ?>
      		<div class="row">
        		<div class="col-sm-12 mx-auto">
        			<div class="box" style="padding: 40px;" >
            		<div class="box-body">
            			<div class="row">
            				<div class="col-sm-12" id="makepdf">
            				<?php echo $data[2]; ?>
            				</div>
            			</div>
            		</div>
            	</div>
						</div>
					</div>
</div>
	</section>

<?php include 'includes/scripts.php'; ?>

<?php include 'includes/footer.php'; ?>

<script>
    var button = document.getElementById("button");
    var makepdf = document.getElementById("makepdf");
  
    button.addEventListener("click", function () {
        var mywindow = window.open("", "PRINT", 
                "height=650,width=900, top=100,left=200");
  
        mywindow.document.write(makepdf.innerHTML);
  
        mywindow.document.close();
        mywindow.focus();
  
        mywindow.print();
        mywindow.close();
  
        return true;
    });
</script>
<script>
function printContent(el){
	var restorepage = $('#makepdf').html();
	var printcontent = $('#' + el).clone();
	$('#makepdf').empty().html(printcontent);
	window.print();
	$('#makepdf').html(restorepage);
	}
</script>
<script type="text/javascript">
  function PrintElem(elem) {
      Popup($(elem).html());
  }

  function Popup(data) {
      var myWindow = window.open('', 'makepdf', 'height=650,width=900, top=100,left=200');
      myWindow.document.write('<html><head><title>my div</title>');
      /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
      myWindow.document.write('</head><body >');
      myWindow.document.write(data);
      myWindow.document.write('</body></html>');
      myWindow.document.close(); // necessary for IE >= 10

      myWindow.onload=function(){ // necessary if the div contain images

          myWindow.focus(); // necessary for IE >= 10
          myWindow.print();
          myWindow.close();
      };
  }
</script>
</body>
</html>