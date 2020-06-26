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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <title>Project Details</title>
  <link href="Admin.css" rel="stylesheet">

  
  <!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["table"]});
 google.setOnLoadCallback(drawChart);
 //google.setOnLoadCallback(drawChart1);
 function drawChart() {
 var data = new google.visualization.arrayToDataTable([
['Project Name','Project Manager','Team Member', 'Start Date','Completion Date','Technology used','Project Description','Project status'],
   // add php start tage
 //$query = "select projects_table.ProjectName,ProjectManager,TeamMember,Date_format(Startdate,'%m/%d/%y') as Startdate,Date_format(Enddate,'%m/%d/%y') as Enddate,Techused,Description, 
                //CASE when proj_update.Percentage <=99 then 'In Progress'
                //ELSE 'Completed' END AS project_status  from projects_table inner join proj_update 
                //on projects_table.ProjectName=proj_update.Projectname order by Startdate desc";
 //$exec = mysqli_query($db,$query);
 //if (!$exec) {
 //echo "Error: %s\n", mysqli_error($db);
  //exit();
 //}
 //while($row = mysqli_fetch_array($exec)){

 //echo "['".$row['ProjectName']."','".$row['ProjectManager']."','".$row['TeamMember']."','".$row['Startdate']."','".$row['Enddate']."','".$row['Techused']."','".$row['Description']."','".$row['project_status']."'],";
 //}
 ?> // php end tag
 
 ]);
 var options = {
 title: 'Project Details',
 showRowNumber: true,
 width: '100%', 
 height: '100%',
 
 };

 
 var table = new google.visualization.Table(document.getElementById("mychart4"));
 table.draw(data, options);

 }
 </script>-->
</head>




<!-- top navbar-->

<body>
  <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow">
  <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">PROJECT DETAILS</a>
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
                Project documents
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ProjectDetails.php">
                <span data-feather="info"></span>
                Project details <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Employee_details.php">
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
      
      <!--<div id="mychart4" style="width: 900px; height: 500px"></div>-->
      
      
      <div class="table-responsive">
      <input class="form-control" type="text" id="myInput"  placeholder="Search for Project Name, Project Status, Manager ...">
      <br>
            <table class="table  table-bordered table-hover table-striped " id="mytable">
    <thead>
        <tr class="header">

            
            <th>Project Name</th>
            <th>Project Manager</th>
            <th>Team Member</th>
            <th>Start Date</th>
            <th>Completion Date</th>
            <th>Technology used</th>
            <th>Project Description</th>
            <th>Project Status</th>
            
        </tr>
    </thead>
            <?php


//connect to db
 $db= mysqli_connect('localhost','root','','mydb1') or die("Error".mysqli_error($db));
// Query to integrate data from update and project table to extract project details and and status 
 $query=mysqli_query($db,"select projects_table.ProjectName,ProjectManager,TeamMember,
 Date_format(Startdate,'%m/%d/%y') as Startdate,Date_format(Enddate,'%m/%d/%y') as Enddate, Techused,Description,
 CASE when proj_update.Percentage <=99 then 'In Progress'
 ELSE 'Completed' END AS project_status  from projects_table inner join proj_update 
 on projects_table.ProjectName=proj_update.Projectname order by Startdate desc");
?>
<tbody id="myTable">
 
<?php while ($row = mysqli_fetch_array($query)){ 
$project_name= $row['ProjectName'];
$manager=$row['ProjectManager'];
$member=$row['TeamMember'];
$start=$row['Startdate'];
$end=$row['Enddate'];
$tech=$row['Techused'];
$desc=$row['Description'];
$status=$row['project_status'];
echo "<tr>
 
  <td><a href=".$project_name."> $project_name</a></td>\n
  <td>$manager</td>\n
  <td>$member</td>\n
  <td>$start</td>\n
  <td>$end</td>\n
  <td>$tech</td>\n
  <td>$desc</td>\n
  <td>$status</td>\n

     </tr>";
      
}
      
    




?> 
</tbody>
</table>
</div>
                   

                    
            </div>
        </div>
    </div>
          
    </div>
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  <!--</div>
  </div>-->

  <!--feather icon-->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
  

</body>

</html>