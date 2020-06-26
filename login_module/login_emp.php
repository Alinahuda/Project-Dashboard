 <?php
session_start();

//connect to db
 $db= mysqli_connect('localhost','root','','mydb1');

 //variable declartion

 $userid="";
 $username="";
 $password="";
 $errors=array();

 //call login fucntion if login-btn is clicked

 if(isset($_POST['login_btn'])) {

    login();
 }

 //login function

 function login() {

    global $db,$username,$password,$errors;
    
    //retrieve values from login page

    $username= e($_POST['username']);
    $password =e($_POST['pwd']);

    // validation of the login page

    if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
 }
// if no errors login the user based on the username

if(count($errors)==0) { 
    
    $query= "select * from user_login where wsuid='$username' and password='$password'";
     $results=mysqli_query($db,$query);
     $logged_in_user = mysqli_fetch_assoc($results);
      
     if (mysqli_num_rows($results) == 1) { //user found
         
         // check if user is admin or user
        
        if ($logged_in_user['role'] == "Admin") {

            $_SESSION['username']=$username;
            header('location://localhost:8080/Projects_Dashboard/Admin_module/Dashboard.php');
            
        }

        else if ($logged_in_user['role'] == "Employee") {

            $_SESSION['username'] = $username;
           
            header('location://localhost:8080/Projects_Dashboard/Employee_Module/EmpDash.php');

        }
    }
     else
    {
        $_SESSION['error']="Wrong Username or password";
        //header('location://localhost/Projects Dashboard_v2/login module/login.php');

        //echo "<script>alert('Username or Password entered is wrong.')</script>";
     }
    }

 }
 
 // escape function e()
function e($val){
	global $db;
    return mysqli_real_escape_string($db, trim($val));
}


