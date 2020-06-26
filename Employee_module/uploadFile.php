<?php
//session_start();

//connect to db
 $db= mysqli_connect('localhost','root','','mydb1') or die("Error".mysqli_error($db));

 
 

 if(isset($_POST["uploadFile"])){

 //file upload
 $targetDir="uploads/";
 //echo $targetDir;
 //$file1=($_POST['file']);
$fileName = basename($_FILES["file"]["name"]);
$fileDesc=e($_POST['fileDesc']);
//echo $fileName;
$path=pathinfo($fileName);
$ext=$path['extension'];
$targetFilePath = $targetDir.$fileName;
//$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$filesize=$_FILES["file"]["size"];
//$Description=$_POST["description_entered"];
//$filetype=$_FILES["upload"]["type"];
// check if the fe format is pdf
//if($fileName!="" && $fileType=="application/pdf"){
    //upload file to server
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 

       $query="insert into files(fileName,Description) values('$fileName','$fileDesc')";
       
       $result=mysqli_query($db,$query);
       
       if($result){
        echo "<script type='text/javascript'>alert('File uploaded  successfully!')</script>";
        
    }
      else
        echo "<script type='text/javascript'>alert('something went wrong!')</script>";
        
        }
   
    }
    
 ?>

