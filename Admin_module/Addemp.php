<?php include('session.php')?>
<?php include('login_functions.php')?>


<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=yes">

  <!--Bootsrap core CSS--->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <!--jjquery lib--->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>


  <!--popper.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <!--javascript lib-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <title>Add an employee</title>
  <link href="Admin.css" rel="stylesheet">
</head>


<!-- top navbar-->

<body>
  <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow ">
  <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ADD EMPLOYEE DETAILS</a>
    <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
    <ul class="navbar-nav navbar-light signout">
      <li class="nav-item text-nowrap">
        <a class="nav-link signout-link" href="admin_logout.php">
          <span data-feather="log-out"></span>
          Sign out</a>
      </li>
    </ul>
  </nav>

  <!--sidebar-->
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-block  navbar-dark  sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link " href="Dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="user-plus"></span>
                Add an employee <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projectfiles.php">
                <span data-feather="file-text"></span>
                Project Documents
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ProjectDetails.php">
                <span data-feather="info"></span>
                Project details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Employee_details.php">
                <span data-feather="users"></span>
                Employee details
              </a>
            </li>

          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="container-fluid">
    <div class="col-md-8 ml-sm-auto col-lg-10  px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <form class="form-signin" method="post" action="Addemp.php">
        
        <?php if(isset($_SESSION['success']))
	{
	?>
	<div class="alert alert-success fade in">
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	    <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
	</div>
	<?php
	}
  unset($_SESSION['success']);
 ?>
          <!-- <h3>Employee Details</h3><br> -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $firstname;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="lastname">Last name</label>
              <input type="text" class="form-control" name="lastname" placeholder="Last name" value="<?php echo $lastname;?>">
            </div>
          </div>

          <div class="form-group required">
            <label for="wsuid">WSUID</label>
            <input type="text" class="form-control" name="wsuid" placeholder="WSUID" value="<?php echo $wsuid;?>">
          </div>

          <div class="form-group required">
  <label for ="role">Role </label>
  <select class="form-control" name="role">                  
  <option value="Employee" selected>Employee</option>
  <option value="Admin">Admin</option>
  </select> 
</div>



          
          <button type="submit" class="btn btn-lg btn-custom btn-block" name="addemp_btn">Save</button>

        </form>
      </div>
    </div>
  </div>

  <!--feather icon-->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>