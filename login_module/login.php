<?php include('login_emp.php')?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Sign-In page</title>
  <link href="login.css" rel="stylesheet">
</head>
<body class="text-centre">


        <form class="form-signin" method="post" action="login.php" width="200" height="200">
        <?php  if(isset($_SESSION['error']))
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
      
            <img class="mb-4" src="cspace.png" alt="cspace" width="200" height="200" style="margin-left:41px">
     
  <!-- <h2 style="text-align:center;font-size:30px;color: ">Login</h2> -->
  
    <div class="form-group" >
    
      <label for="Username">WSUID:</label>
      
      <input type="text" class="form-control" name="username" placeholder="Enter wsuid" autofocus required>
</div>
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      
      <input  type="password" class="form-control" name="pwd" placeholder="Enter password" required>
    </div>

    
   
    <button type="submit" class="btn btn-lg btn-custom btn-block" name="login_btn">LOGIN</button>
   
    </form>

  
<!--feather icon-->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

</body> 
</html>
