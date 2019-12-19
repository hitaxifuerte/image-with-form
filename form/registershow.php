<h1 align="center" color="blue">Registration Information...</h1>
<?php
$con= mysqli_connect("localhost", "root", "", "example");
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];

if($con === false)
{
    die("connection failed.... " . mysqli_connect_error());
}
$sql = "SELECT * FROM registration where email='$email' and name='$name' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
	   echo "<table border='1' align='center'><tr>
				<td>Name</td>
				<td>".$row["name"]."</td>
				</tr>
				<tr>
				<td>Email</td>
				<td>".$row["email"]."</td>
				</tr>
				<tr>
				<td>Password</td>
				<td>".$row["password"]."</td>
				</tr>
				<tr>
				<td>gender</td>
				<td>".$row["gender"]."</td>
				</tr>
				<tr>
				<td>Hobbies</td>
				<td>".$row["hobbies"]."</td>
				</tr>
				<tr>
				<td>Mobileno</td>
				<td>".$row["mno"]."</td>
				</tr>
				<tr>
				<td>city</td>
				<td>".$row["city"]."</td>
				</tr>
				<tr>
				<td>Image</td>
				<td><img src=uploads/".$row["image"]." height='100' width='100'></td>
				</tr>
				</table><br>";
    }
} else {
    echo "0 results";
}

$con->close();

?>
