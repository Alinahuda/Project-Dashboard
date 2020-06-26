<?php
	if(isset($_SESSION['success']))
	{
	?>
	<div class="alert alert-success fade in">
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	    <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
	</div>
	<?php
	}
	unset($_SESSION['success']);
	if(isset($_SESSION['error']))
	{
	?>
	<div class="alert alert-danger fade in">
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	    <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
	</div>
	<?php
	}
	unset($_SESSION['error']);
?>