<?php   include "Registration.php" ; ?>
<?php   include "Control\myform.php" ; ?>
<?php 

$radioValidate="";
$checkboxValidate="";
/*
if(isset($_REQUEST["gender"]))
{
    $radioValidate= "Gender - ".$_REQUEST["gender"];
}
*/
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $checkboxValidate="";
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


if(isset($_REQUEST["gender"]))
{
    $radioValidate= $_REQUEST["gender"];
}



$target_File="File/".$_FILES["fileupload"]["name"];


}


$formdata = array(
    'Name'=> $_POST["name"],
    'Email'=> $_POST["email"],
    'Password'=>$_POST["password"],
    'Comment'=> $_POST["comment"],
    'Gender'=>"$radioValidate",
    'Hobby'=>"$checkboxValidate",
    "File_Path"=>"$target_File"
   

 );


 $existingdata = file_get_contents('data.json');
 $tempJSONdata = json_decode($existingdata);
 $tempJSONdata[] =$formdata;

 $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
 

 if(file_put_contents("data.json", $jsondata)) {
      echo "Your Data has been saved successfully!  <br>";
  }
 else 
      echo "no data saved";

$data = file_get_contents("data.json");

$mydata = json_decode($data);


foreach($mydata as $myobject)
{
foreach($myobject as $key=>$value)
{
  echo "your ".$key." is: ".$value."<br>";
} 
echo "<br>";
}



?>