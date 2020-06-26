<?php include('emp_session.php')?>

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
    

    <title>Project Documents</title>
    <link href="Emp.css"rel="stylesheet">
</head>


<!-- top navbar-->

<body>
    <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow ">
    <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">PROJECT DOCUMENTS</a>
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
                                <a class="nav-link " href="EmpProfile.php">
                                    <span data-feather="user"></span>
                                    My Profile
                                </a>
                        <li class="nav-item">
                            <a class="nav-link " href="Addproject.php">
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
                            <a class="nav-link active" href="downloadFile.php">
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
            
    <div class="table-responsive">
            <table class="table table-bordered table-hover " id="dataTables-example">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>File Description</th>
            <th>File Name</th>
            
        </tr>
    </thead>
            <?php


//connect to db
 $db= mysqli_connect('localhost','root','','mydb1') or die("Error".mysqli_error($db));

 $download=mysqli_query($db,"select ID,FileName,Description from files order by ID");
?>
<tbody>
 
<?php while ($row = mysqli_fetch_array($download)){ 
$files_field= $row['FileName'];
$files_show= "Uploads/$files_field";
$file_desc=$row['Description'];
$file_id=$row['ID'];
echo "<tr>
 
  <td>$file_id</td>\n
  <td>$file_desc</td>\n
  <td><a href='$files_show'>$files_field</a></td>\n
     </tr>";
      
}
      
    




?> 
</tbody>
</table>
</div>
                   

                    
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





 