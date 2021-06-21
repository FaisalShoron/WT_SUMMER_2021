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
    $Name="Name Cant be empty !!";
}
else if( strlen($Name)<5)
{
    $Name="Your Name Must contain at least 4 character !!";
}
else if(empty($Name) &&  strlen($Name)<5)
{
    $Name="Invalid Name formate !!";
}



if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
{
    $emailValidate="You Must Enter Valid Email";
}
else{
    $emailValidate= "Your Email is ".$email;
}


if(strlen($Password)<8)
{
    $passwordValidate=" Password Must Contain 8 character!!";
}
else{
    $passwordValidate=$Password;
}



if(strlen($Comment)<20)
{
    $commentValidate=" Comment Must Contain 20 character!!";
}
else{
    $commentValidate=$Comment;
}

if(isset($_REQUEST["gender"]))
{
    $radioValidate= "Gender - ".$_REQUEST["gender"];
}
else{
    $radioValidate= "       Please Select Your Gender";
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




} 
 ?>
