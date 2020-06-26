<?php include('session.php')?>
<!-- Establishng Database connection -->
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
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

  <!--Bootsrap core CSS--->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  
 
  

    <!--popper.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <!--javascript lib-->
  

  <!--chart.js
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>-->

  <title>Admin Dashboard</title>
  <link href="Admin.css" rel="stylesheet">

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 //google.setOnLoadCallback(drawChart1);
 function drawChart() {
 var data = new google.visualization.arrayToDataTable([
// Query to display project status
 ['Project Name', 'Percentage',{ role: 'style' }],
 <?php 
 $query = "select Projectname,Percentage,Date from proj_update where Percentage<=99 order by Date";
 $exec = mysqli_query($db,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Projectname']."',".$row['Percentage'].",'color: #000000'],";
 }
 ?>
 
 ]);

 

 var options = {
 //title: 'Project Status'
 hAxis: {title: 'Project Name', titleTextStyle: {color: 'black'}},
    colors: ['#000000'],
      is3D:true
 
 };

 
 var chart = new google.visualization.ColumnChart(document.getElementById("mychart1"));
 chart.draw(data, options);

 }

 
 google.load("visualization", "1", {packages:["table"]});
 google.setOnLoadCallback(drawTable);
 function drawTable(){
  var data = new google.visualization.arrayToDataTable([
['Project Name','Updated Date','Project stage'],
 // Query to extract Project stage 
 <?php 
 $query = "select Projectname,Date_format(Date,'%m/%d/%y') as Date ,Projstage from proj_update";
 $exec = mysqli_query($db,$query);
 if (!$exec) {
  printf("Error: %s\n", mysqli_error($db));
  exit();
 }
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Projectname']."','".$row['Date']."','".$row['Projstage']."'],";
 }
 ?>
 
 ]);
 var options = {
 title: 'Project Progress Details',
 showRowNumber: true,
 width: '70%', 
 height: '50%',
 
 };

 
 var table = new google.visualization.Table(document.getElementById("mytable1"));
 table.draw(data, options);
 }
 </script>
</head>

  
<!-- top navbar-->

<body>
  <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow ">
    <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
    <a class="navbar-brand col-sm-3 col-md-2 " href="#">Admin Dashboard</a>
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
        <!-- <div class="admin_dashboard col-sm-3 col-md-2"  >
        <a class=" " href="#">Admin Dashboard</a></div> -->
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="Dashboard.php">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
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
              <a class="nav-link" href="ProjectDetails.php">
                <span data-feather="info"></span>
                Project details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Employee_Details.php">
                <span data-feather="users"></span>
                Employee details
              </a>
            </li>
          </ul>
        </div>
      </nav>
    
  
        <!-- content area-->

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap  pt-3 pb-2 mb-3 border-bottom">
            
            
          </div>
         
         <!--bootstrap cards-->
          <?php
          $query="select count(distinct ProjectName) as 'Total Number of projects' from projects_table";

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
     <div class="card card-custom" >
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
          $query="select count(distinct ProjectName) as 'Number of Projects in Progress' from proj_update where Percentage>0 and Percentage<99";

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
          $query="select count(distinct ProjectName) as 'Number of projects Completed' from proj_update where Percentage=100";

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
     
     <div class="card  card-custom ">
       
     <div class="card-body">
          
          <p class="card-title "> Projects Completed </p>
          <h4 class="card-text  font-weight-normal"><?php echo $row['Number of projects Completed']; ?></h4>
          </div>
   </a>
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
     <div id="mychart1" style="width: 100%; height: 500px"></div>
     <hr style="width: 100%; color: black; height: 1px; background-color:grey;" />
     <div id="mytable1"  style="width: 900px; height: 500px"></div>

       
      
         
     
     <!-- <div class="footer">
       <div class="container">
       <div class="row">
         <div class="col">
         
         <a href="https://www.wichita.edu" target="_blank" class="footer-logo">
         <img src="https://www.wichita.edu/_resources/images/logo-secondary.svg" alt="WSU logo"></a>
</div>
         <div class="col">
           <img src="cspace.png"></a>
</div>
<div>
</div>
</div> -->
     
      </main>
    </div>
  </div> 
       
    
<!--feather icon-->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

</body>
</html>