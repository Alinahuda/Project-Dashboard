<?php
//session_start();

//connect to db
 $db= mysqli_connect('localhost','root','','mydb1') or die("not connected");

 
  

//variable declaration
$Name="";
$Description="";
$Techused="";
$startdate="";
$enddate="";
$wsuid="";
$member="";
$errors=array();

if(isset($_POST['project_add'])) {

    projadd();

}

function projadd()
{
    global $db,$Name,$Description,$Techused,$startdate,$enddate,$errors,$result,$Manager;

    //retrieve values from project page

    $Name=e($_POST['name']);
    $Manager=e($_POST['projman']);
    $Description=e($_POST['Description']);
    $Techused=e($_POST['techused']);
    $startdate=e($_POST['startdate']);
    $enddate=e($_POST['enddate']);
    $wsuid=e($_POST['wsuid']);
    $member=e($_POST['projmem']);
    // insert the values in DB

    $query="Insert into projects_table(ProjectName,ProjectManager,TeamMember,wsuid,Startdate,Enddate,Description,Techused)
    values('$Name','$Manager','$member','$wsuid','$startdate','$enddate','$Description','$Techused')";
    $query_1="insert into proj_update(Projectname,wsuid) values ('$Name','$wsuid')";
    
    $result=mysqli_query($db,$query);
    $result1=mysqli_query($db,$query_1);
    if($result && $result1) {
        echo "<script type='text/javascript'>alert('Project added  successfully!')</script>";
    }
      else
        echo "<script type='text/javascript'>alert('something went wrong!')</script>";
        //echo("Query not updateded " . mysqli_error($con));

mysqli_close($db);

}

// escape function e()
function e($val){
	global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
    }
}

