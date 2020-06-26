<?php
//session_start();

//connect to db
 $db= mysqli_connect('localhost','root','','mydb1') or die("not connected");

 
  

//variable declaration
$firstname="";
$lastname="";
$wsuid="";
$Major="";
$date="";
$team="";

if(isset($_POST['emp_prof'])) {

    emp_prof();

}

function emp_prof()
{
    global $db,$firstname,$lastname,$wsuid,$Major,$date,$team;

    //retrieve values from project page

    $firstname=e($_POST['firstname']);
    $lastname=e($_POST['lastname']);
    $wsuid=e($_POST['wsuid']);
    $Major=e($_POST['major']);
    $date=e($_POST['empdate']);
    $team=e($_POST['team']);
    $gmail=e($_POST['gmail']);
    $wsuemail=e($_POST['wsu']);
    $contact=e($_POST['contact']);
    $graddate=e($_POST['graddate']);
    

    // insert the employee details into employee details table

    $query="Insert into employee_details(WSUId,firstname,lastname,Major,Gmail,WsuEmail,Contact,Team,Empdate,GradDate)
    values('$wsuid','$firstname','$lastname','$Major','$gmail','$wsuemail','$contact','$team','$date','$graddate')";
    
    $result=mysqli_query($db,$query);
    
    if($result) {
        echo "<script type='text/javascript'>alert('Employee  added  successfully!')</script>";
    }
      else
      //echo "<script type='text/javascript'>alert('something went wrong!')</script>";
      echo("Query not executed " . mysqli_error($db));

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