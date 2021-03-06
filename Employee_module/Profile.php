<?php include('emp_session.php')?>
<?php include('Empprofile_function.php')?>

<!DOCTYPE html>
<html>
    <head>
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
    <!--date-picker library-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"></script>

    <title>Employee Profile</title>
    <link href="Emp.css"rel="stylesheet">
</head>


<!-- top navbar-->

<body>
    <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow p-0">
    <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">EMPLOYEE PROFILE</a>
        <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
        <ul class="navbar-nav navbar-light signout">
            <li class="nav-item text-nowrap">
                <a class="nav-link signout-link" href="emp_logout.php">
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
                            <a class="nav-link " href="EmpDash.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link active" href="Profile.php">
                                    <span data-feather="user"></span>
                                    My Profile
                                </a>

                        <li class="nav-item">
                            <a class="nav-link" href="Addproject.php">
                                <span data-feather="file-plus"></span>
                                Add new project
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="updateproject.php">
                                <span data-feather="edit"></span>
                                Update Project details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="downloadFile.php">
                                <span data-feather="download"></span>
                                Project Documents
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-8 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        
    
    <?php 
    $username="";
    $Wsuid="";
    $Firstname="";
    $Lastname="";
    $major="";
    $Team="";
    $joindate="";
    $gmail="";
    $wsuemail="";
    $contact="";
    $graddate="";
    if($_SESSION['username']==true){
        $username=$_SESSION['username'];
    }  
 $select_query="select WSUID,firstname,lastname,Major,Gmail,WsuEmail,Contact,Team,Empdate,GradDate from employee_details where WSUID='$username' ";
 $result1=mysqli_query($db,$select_query);
 while ($row = mysqli_fetch_array($result1)) {
    $Wsuid=$row['WSUID'];
    $Firstname = $row['firstname'];
    $Lastname = $row['lastname'];
    $major=$row['Major'];
    $Team=$row['Team'];
    $joindate=$row['Empdate'];
    $gmail=$row['Gmail'];
    $wsuemail=$row['WsuEmail'];
    $contact=$row['Contact'];
    $graddate=$row['GradDate'];
 }
 ?>

 <form>
  <!-- <h3>Your Profile</h3> -->


<div class="form-row">
        <div class="form-group col-md-6">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="firstname" value="<?php  echo $Firstname ?> " readonly>
        </div>

        <div class="form-group col-md-6">
          <label for="lastname">Last name</label>
          <input type="text" class="form-control" name="lastname" value="<?php  echo $Lastname ?>" readonly>
        </div>
      </div>

      <div class="form-group">
        <label for="wsuid">WSUID</label>
        <input type="text" class="form-control" name="wsuid" value="<?php  echo $Wsuid ?>" readonly>
      </div>

                    <div class="form-group">
                        <label for="gmailid">Gamil ID</label>
                        <input type="text" class="form-control" name="gmail" value="<?php  echo $gmail ?>" readonly>
                    </div>

                          <div class="form-group">
                            <label for="WSUID">WSU Email</label>
                            <input type="text" class="form-control" name="wsu" value="<?php  echo $wsuemail ?>" readonly>
                          </div>

                          <div class="form-group">
                            <label for="contact">Contact No.</label>
                            <input type="text" class="form-control" name="contact" value="<?php  echo $contact ?>" readonly>
                          </div>

                          <div class="form-group">
                            <label for="graddate">Graduation Date</label>
                            <input type="date" class="form-control" name="graddate" value="<?php  echo $graddate ?>" readonly>
                          </div>
<div class="form-group">
<label for="major">Major</label>
<input type="text" class="form-control" name="major" value="<?php  echo $major ?>" readonly>
</div>

<div class="form-group">
<label for="date">Date of joining</label>
<input type="text" class="form-control" name="empdate" value="<?php  echo $joindate ?>" readonly>
</div>

<div class="form-group">


<label for="team">Team</label>

<input type="text" class="form-control" name="major" value="<?php  echo $Team ?>" readonly>

</div>
 

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