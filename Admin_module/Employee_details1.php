<?php include('session.php')?>
<?php
 $db = mysqli_connect('localhost','root','','mydb1');
 $username="";
    if($_SESSION['username']==true){
    $username=$_SESSION['username'];
    }

 ?>

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
  <title>Project Details</title>
  <link href="Admin.css" rel="stylesheet">

  
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["table"]});
 google.setOnLoadCallback(drawChart);
 //google.setOnLoadCallback(drawChart1);
 function drawChart() {
 var data = new google.visualization.arrayToDataTable([
['Employee Name','Major','Gmail Id', 'WSU Email','Contact Number','Team','Joining Date','Graduation Date'],
 <?php 
 $query = "select concat(firstname,' ',lastname) as EmployeeName,Major,Gmail,WsuEmail,Contact,
 Team,Date_format(Empdate,'%m/%d/%y') 
 as Empdate,Date_format(GradDate,'%m/%d/%y') as GradDate from employee_details order by Empdate";
 $exec = mysqli_query($db,$query);
 if (!$exec) {
 echo "Error: %s\n", mysqli_error($db);
  exit();
 }
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['EmployeeName']."','".$row['Major']."','".$row['Gmail']."','".$row['WsuEmail']."','".$row['Contact']."','".$row['Team']."','".$row['Empdate']."','".$row['GradDate']."'],";
 }
 ?>
 
 ]);
 var options = {
 title: 'Employee Details',
 showRowNumber: true,
 width: '100%', 
 height: '100%',
 
 };

 
 var table = new google.visualization.Table(document.getElementById("mychart3"));
 table.draw(data, options);

 }
 </script>
</head>




<!-- top navbar-->

<body>
  <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="Dashboard.php">Admin Dashboard</a>
    <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
    <ul class="navbar-nav navbar-light bg-secondary px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="admin_logout.php">
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
            <?php 
              if($username=="Kathy"){
              echo "<li class='nav-item' style='display:none'>
              <a class='nav-link' href='Addemp.php'>
                <span data-feather='user-plus'></span>
                Add an employee
              </a>
            </li>";
              }
              else{
               echo" <li class='nav-item'>
              <a class='nav-link' href='Addemp.php'>
                <span data-feather='user-plus'></span>
                Add an employee
              </a>
            </li>";
              }
              ?>
            <li class="nav-item">
              <a class="nav-link" href="projectfiles.php">
                <span data-feather="file-text"></span>
                Project Documents
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="ProjectDetails.php">
                <span data-feather="info"></span>
                Project Details <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Employee_details.php">
                <span data-feather="users"></span>
                Employee Details <span class="sr-only">(current)</span>
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
      
      <div id="mychart3" style="width: 900px; height: 500px"></div>

          
    </div>
  </div>

  <!--feather icon-->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>