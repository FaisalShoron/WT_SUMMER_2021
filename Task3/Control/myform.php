<?php
$Name="";
$email="";
$Comment="";
$passwordValidate="";
$commentValidate="";
$radioValidate="";
$checkboxValidate="";
$v1=$v2=$v3="";
$emailValidate="";
$Password="";
$validFile="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$Name=$_REQUEST["name"]; 
$email=$_REQUEST["email"]; 
$Comment=$_REQUEST["comment"];
$Password=$_REQUEST["password"];

if(!empty($Name) && strlen($Name)>=5) 
{
    $Name="You are ".$Name;
}

else if(empty($Name))
{
    $Name="Name Can not be empty !!";
}
else if( strlen($Name)<5)
{
    $Name="Your Name Must contain at least 4 characters !!";
}
else if(empty($Name) &&  strlen($Name)<5)
{
    $Name="Invalid Name format !!";
}



if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
{
    $emailValidate="You Must Enter a Valid Email !!";
}
else{
    $emailValidate= "Your Email is : ".$email;
}


if(strlen($Password)<8)
{
    $passwordValidate="Your Password Must Contain 8 characters !!";
}
else{
    $passwordValidate=$Password;
}



if(strlen($Comment)<20)
{
    $commentValidate="Your Comment Must Contain 15 characters !!";
}
else{
    $commentValidate=$Comment;
}

if(isset($_REQUEST["gender"]))
{
    $radioValidate= "Gender - ".$_REQUEST["gender"];
}
else{
    $radioValidate= "      Please Select Your Gender";
}



if(!isset($_REQUEST["Dancing"])&&!isset($_REQUEST["Singing"])&&!isset($_REQUEST["Reading"]))
{
    $checkboxValidate = "Please Select at Least One Checkbox";
    
}
else{

   $checkboxValidate="Your Selected Hobby : ";
   if(isset($_REQUEST["Dancing"]))
   {
       $v1= $_REQUEST["Dancing"];
       $checkboxValidate=$checkboxValidate.$v1;
   }
   if(isset($_REQUEST["Singing"]))
   { 
       $v2= $_REQUEST["Singing"];
       $checkboxValidate=$checkboxValidate.",".$v2;
   }
   if(isset($_REQUEST["Reading"]))
   {
    $v3= $_REQUEST["Reading"];
    $checkboxValidate=$checkboxValidate.",".$v3;
   }
   
}

$target_File="File/".$_FILES["fileupload"]["name"];

if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_File))
{
    echo "You have uploaded a new file";
   #echo "br".$_FILES(["fileupload"]["type"]);
    #echo "<img src='".$target_File."'>";
}
else 
    $validFile= "Sorry , You must upload a file to continue !!";




} 
 ?>
