
<?php include('Empprofile_function.php')?>
            <?php
            session_start();
            $username="";
            $wsuid1="";
            if($_SESSION['username']==true){
                $username=$_SESSION['username'];
            }
            $query="select WSUID from employee_details where WSUID='$username'";
            $results=mysqli_query($db,$query);
            


    if (mysqli_num_rows($results) == 1){
        header('Location://localhost:8080/Projects_Dashboard/Employee_module/Profile.php'); 
    }  
    else
    {
        header('Location://localhost:8008/Projects_Dashboard/Employee_module/empPro.php'); 
    }
  ?>   
            