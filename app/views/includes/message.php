<style type="text/css">
	.alert{
		padding: 5px;
		font-size: 15px;
	}
	#close{
		padding: 5px;
	}
</style>

<?php
if(isset($_SESSION['error'])){
	echo "
		<div class='alert alert-danger alert-dismissible'>
		<button type='button' id='close' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$_SESSION['error']."</div>";
		unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
	echo "
		<div class='alert alert-success alert-dismissible'>
		<button type='button' id='close' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> ".$_SESSION['success']." </div> ";
		unset($_SESSION['success']);
	}

?>
