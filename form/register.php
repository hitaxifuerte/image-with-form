<?php
session_start();
$name=$_POST['name'];

$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];

//$image=$_POST['image'];
$mno=$_POST['mno'];
$city=$_POST['city'];
$hobbies = implode(',', $_POST['hobbies']);
@$nameimage = $_FILES['file']['name'];
@$size = $_FILES['file']['size'];
@$type = $_FILES['file']['type'];
@$tmp_name = $_FILES['file']['tmp_name'];

$con= mysqli_connect("localhost", "root", "", "example");
if($con === false)
{
    die("connection failed.... " . mysqli_connect_error());
}
 
$qry = "insert into registration (name,email,password,mno,city,image,gender,hobbies) VALUES ('$name','$email','$password','$mno','$city','$nameimage','$gender','$hobbies')";
if(mysqli_query($con, $qry))
{
	$location = 'uploads/';
    if (move_uploaded_file($tmp_name, $location. $nameimage))
	{
    echo 'Uploaded';
    }
    else 
    {
        echo 'Please choose a file';
    }
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	echo $name;
	echo $email;
	echo "<script>alert('record insert sucessfully.......');";
	echo "window.location='registershow.php'";
	echo "</script>";
 
}
 else
 {
	  echo '<script language="javascript">';
		echo 'alert("error in data insert.....................")'. mysqli_error($con); 
 
		
		echo '</script>';
   
}


mysqli_close($con);
?>