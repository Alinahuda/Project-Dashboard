<?php include('emp_session.php')?>
<?php include('addproj_function.php')?>


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
    

    <title>Add a project</title>
    <link href="Emp.css"rel="stylesheet">
</head>


<!-- top navbar-->

<body>
    <nav class="navbar navbar-custom sticky-top flex-md-nowrap navbar-dark bg-company-yellow p-0">
    <div class="wsu-logo">
      <img src="wsu_logo.png" style="height:80px">
</div>
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ADD A PROJECT</a>
        
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
                            <a class="nav-link active" href="#">
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
                <form  method="POST" action="Addproject.php">
                <?php echo display_error();?>   

                <div class="content">
		<!-- notification message -->
	<?php if (isset($_SESSION['success_1'])) : ?>
			<div class="alert alert_success" >
				<h3>
					<?php 
						echo $_SESSION['success_1']; 
            unset($_SESSION['success_1']);
             //header('location:Addproject.php');
            
					?>
				</h3>
			</div>
		<?php endif ?>

                    <!-- <h3>Project Details</h3><br> -->
                    
                    <div class="form-group">
                        <label for="name">Project Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Project Name" style="width: 500px;">
                    </div>

                    <div class="form-group">
                                <label for="Projectmanager">Project Manager</label>
                                <input type="text" class="form-control" name="projman" placeholder="Project Manager">
                        </div>

                        <div class="form-group">
                                <label for="TeamMember">Team Member</label>
                                <input type="text" class="form-control" name="projmem" placeholder="Team Member">
                        </div>

                        <div class="form-group">
                                <label for="WSUID">WSUID</label>
                                <input type="text" class="form-control" name="wsuid" placeholder="Enter wsuid" required">
                        </div>
                        

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="Description" placeholder="Description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Technology">Technologies used</label>
                        <textarea class="form-control" name="techused" placeholder="Technologies used" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Start date</label>
                        <input type="date" class="form-control" name="startdate" placeholder="MM/DD/YYYY">
                    </div>

                    <div class="form-group">
                        <label for="date">End date</label>
                        <input type="date" class="form-control" name="enddate" placeholder="MM/DD/YYYY">
                    </div>

                    
  





                    <button type="submit" class="btn btn-lg btn-secondary btn-block" name="project_add">Save</button>
                    
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