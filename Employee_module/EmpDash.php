<?php include('emp_session.php')?>
<?php
//session_start();
$username="";
    if($_SESSION['username']==true){
    $username=$_SESSION['username'];
    }
 $db = mysqli_connect('localhost','root','','mydb1');
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <title>Employee Dashboard</title>
    <link href="Emp.css" rel="stylesheet">

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 //google.setOnLoadCallback(drawChart1);
 function drawChart() {
 var data = new google.visualization.arrayToDataTable([

 ['Projectname', 'Percentage',{ role: 'style' }],
 <?php 

    
   
 $query = "select proj_update.Projectname,Percentage from proj_update inner join projects_table on proj_update.Projectname=projects_table.ProjectName where projects_table.wsuid='$username' and proj_update.Percentage<=99";

    //echo $query;
 $exec = mysqli_query($db,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Projectname']."',".$row['Percentage'].",'color: black'],";
 }

 ?>
 
 ]);

 

 var options = {
 //title: 'Project Status'
 hAxis: {title: 'Project Name', titleTextStyle: {color: 'black'}},
      colors: ['black'],
      is3D:true
 };

 
 var chart = new google.visualization.ColumnChart(document.getElementById("mychart3"));
 chart.draw(data, options);

 }
 </script>
</head>

<!-- top navbar-->

<body>
    <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow">
    <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>    
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Employee Dashboard</a>
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
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link " href="EmpProfile.php">
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
                                Project documents
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


        <!-- content area-->

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <!-- <h1 class="h2">Employee Dashboard</h1> -->
           
          </div>
          
          <!--bootstrap cards-->
          <?php
          $query="select count(distinct ProjectName) as 'Total Number of projects' from projects_table where wsuid='$username'";

          if (mysqli_query($db, $query)) 
{
   echo "";
} 
 else 
{
  echo "Error:".mysqli_error($db);
}
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0)
 {
   // output data of each row
   while($row = mysqli_fetch_assoc($result))
   {
     ?>
     <div class="row">
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
     <div class="card card-custom">
     <div class="card-body">
          
          <p class="card-title"> Total Number of Projects </p>
          <h4 class="card-text font-weight-normal"><?php echo $row['Total Number of projects']; ?></h4>
          </div>
          </div>
          </div>
         
          <?php
   }
  }
  else {

    echo "0 Projects";
  }
  ?>

  <!--card 2-->
   <?php
          $query="select count(distinct proj_update.Projectname) as 'Number of Projects in Progress' from proj_update inner join projects_table on proj_update.Projectname=projects_table.ProjectName where projects_table.wsuid='$username' and Percentage>0 and Percentage<99";

          if (mysqli_query($db, $query)) 
{
   echo "";
} 
 else 
{
  echo "Error:" . mysqli_error($db);
}
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0)
 {
   // output data of each row
   while($row = mysqli_fetch_assoc($result))
   {
     ?>
      
    
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
     <div class="card card-custom">
     <div class="card-body">
          
          <p class="card-title"> Projects In Progress </p>
          <h4 class="card-text font-weight-normal"><?php echo $row['Number of Projects in Progress']; ?></h4>
          </div>
          </div>
          </div>
          
          <?php
   }
  }
  else {

    echo "0 Projects";
  }
  ?>

  <!--card 3-->
  
  <?php
          $query="select count(distinct proj_update.    Projectname) as 'Number of projects Completed' from proj_update inner join projects_table on proj_update.projectname=projects_table.ProjectName where projects_table.wsuid='$username' and Percentage=100";

          if (mysqli_query($db, $query)) 
{
   echo "";
} 
 else 
{
  echo "Error:". mysqli_error($db);
}
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0)
 {
   // output data of each row
   while($row = mysqli_fetch_assoc($result))
   {
     ?>
      
    
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
     <div class="card card-custom">
     <div class="card-body">
          
          <p class="card-title"> Projects Completed </p>
          <h4 class="card-text font-weight-normal"><?php echo $row['Number of projects Completed']; ?></h4>
          </div>
          </div>
          </div>
          
          <?php
   }
  }
  else {

    echo "0 Projects";
  }
  ?>
         
      

          <!-- chart container -->    
                <div id="mychart3" style="width: 900px; height: 500px"></div>
<   </main>
    </div>

</div>

    <!--feather icon-->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>