<?php include('emp_session.php')?>
<?php include('updateproj_function.php')?>
<?php include('uploadFile.php')?>
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
    <title>Update Project Details</title>
    <link href="Emp.css" rel="stylesheet">
</head>

<!-- top navbar-->

<body>
    <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow ">
    <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">UPDATE PROJECT DETAILS</a>
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
                            <a class="nav-link active" href="">
                                <span data-feather="edit"></span>
                                Update Project details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="downloadfile.php">
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
                <form method="post" action="updateproject.php" enctype="multipart/form-data">
                
                    <!-- <h3>Update Project Details</h3><br> -->
                    
                  <div class="form-group">
                        
                        
                        <label for="project">Select the project</label>
                        <br/>
                        
                        <?php
                        
                        $username="";
                        if($_SESSION['username']==true){
                            $username=$_SESSION['username'];
                        
                        
                        
                         $db= mysqli_connect('localhost','root','','mydb1') or die("not connected");

                         
                        $select_query="select  ProjectName from projects_table where wsuid='$username'";
                        
                        echo '<select class="form-control" name="project">';
                         echo '<option value=" ">'.'--- Please Select project ---'.'</option>';
                         
                       
                        $select_query_run=mysqli_query($db,$select_query);
                        
                        
                    while   ($row=   mysqli_fetch_assoc($select_query_run) )
                            {
                                echo "<option value='".$row['ProjectName']."' >".$row['ProjectName']."</option>";                        
                                }
                                echo "</select>"; 
                            }
                                mysqli_close($db)
                            
                        
                            ?>
                            <br/>
                            <br/>
                        </div>
                        
                    
                    <div class="form-group required">
                        <label for="percent completed">Enter Percentage completed</label>
                        <input type="number" class="form-control" name="percent">
                    </div>
                    <br/>

  <div class="form-group required">
  <label for ="projectstage">Select Project development stage: </label>
  <select class="form-control" name="projstage">                  
  <option value="Project Initiation" selected>Project Initiation</option>
  <option value="Project Planning">Project Planning</option>
  <option value="Project Execution">Project Execution</option>
  <option value="Project Monitoring">Project Monitoring</option>
  <option value="Project Closing">Project Closing</option>
</select> 
</div>
                   <br/>
                   <br/>   

                   <div class="form-group">
                                <label for="fileDesc">File Description</label>
                                <input type="text" class="form-control" name="fileDesc" placeholder="File Description">
                        </div>

                    <div class="form-group">
    <label for="file uplaod">Upload Project Related Documents/SOP </label>
    <input type="file" class="form-control-file" name="file">
    <br/>
        <input type="submit"class="btn btn-file"  value="Upload Files" name="uploadFile" formaction="updateproject.php">
  </div>
                    

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="projupdatedate" placeholder="MM/DD/YYYY">
                    </div>

                    
                    <button type="submit" class="btn btn-lg btn-secondary btn-block" name="update_proj">Save</button>
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