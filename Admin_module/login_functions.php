<?php
//session_start();

//connecting to mydb1 databse
$db = mysqli_connect('localhost','root','','mydb1');

//variable declaration
$wsuid="";
$firstname ="";
$lastname ="";
$role="";
$errors=array();

//call the login_fucntion() if addemp_btn is clicked
if(isset($_POST['addemp_btn'])) {

        add();
}

function add(){

    // declare these variables as global to access them within the function
     global $db ,$wsuid,$firstname,$lastname,$errors,$role;

     // call e() function to retrieve the data from the addemp.php page

     $firstname= e($_POST['firstname']);
     $lastname= e($_POST['lastname']);
     $wsuid =e($_POST['wsuid']);
     $role=e($_POST['role']);

     //input validation
     if(empty($firstname)) {
         array_push($errors,"Firstname should be filled");
     }
     if(empty($lastname)) {
         array_push($errors,"Last name should be filled");
     }
    if(empty($wsuid)) {
        array_push($errors,"wsuid is required");
    }

     // add the employee if no errors
     if(count($errors)==0) {
         $query="Insert into add_emp(wsuid , Firstname , Lastname,Role) values('$wsuid','$firstname','$lastname','$role')";
         $query1="Insert into user_login(wsuid,password,role) values('$wsuid',concat('$firstname','$lastname'),'$role')";
         //$query1="insert into user_login(username,password) values('alina','huda')";
         mysqli_query($db,$query);
         mysqli_query($db,$query1);
         $_SESSION['success']="Employee added successfully";
         
         //echo "<br/><br/><span>Employee added successfully...!!</span>";
         //header('location:Dashboard.php');  
         }
         else{
            $_SESSION['error']="Some error occurred";
         }

}

// escape function e()
function e($val){
	global $db;
    return mysqli_real_escape_string($db, trim($val));
}













