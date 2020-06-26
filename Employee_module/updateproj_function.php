<?php
//session_start();

$db=mysqli_connect('localhost','root','','mydb1');
 

$projectname="";
$percent="";
$updatedate="";
$projstage="";

if(isset($_POST['update_proj'])){
    updateproj();
}

function updateproj() {

    global $db,$projectname,$percent,$date,$projstage;


$projectname=e($_POST['project']);
$percent=e($_POST['percent']);
$updatedate=e($_POST['projupdatedate']);
$projstage=e($_POST['projstage']);

//update project details
$query1="update proj_update set Percentage='$percent',Date='$updatedate',Projstage='$projstage' 
where Projectname='$projectname'";

//echo mysqli_error();
$result_row=mysqli_query($db,$query1);

if($result_row) {

    //$_SESSION['success']="Project Details updated successfully";
        echo "<script type='text/javascript'>alert('Project details updated successfully!')</script>";
    }
      else
        echo "<script type='text/javascript'>alert('something went wrong!'.)</script>";
        //echo "bcbkjdjdjjdjdjdjjdjdjdjdjjdjdjdjdjdjdjdjdjdjjjdsomething went wrong".mysqli_error();

        mysqli_close($db);
}

function e($val){
	global $db;
    return mysqli_real_escape_string($db, trim($val));
}




