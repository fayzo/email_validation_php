<?php
// to connect database with host or localhost and username and password
$dbhost = "localhost";
$dbuser = "fayzo";
$dbpass = "";
$dbname = "upand_running";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// to idenntify if they is error in connection in database
if (mysqli_connect_errno()){
	die("database connection failed:"
	  .mysqli_connect_error().
	"(".mysqli_connect_errno().")"
	);
}
// to select in database and manipulate and retrive
// u can use method or option to select in sql below as follow:
// $sql = "SELECT *"; 
// $sql .= "FROM login";
// or u can use dat method:
if($_SERVER["REQUEST_METHOD"] == "POST"){

	 if(!empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($username) 
    && !empty($password) && !empty($cpassword) && !empty($email) && isset($gender)){
   $firstname = mysqli_real_escape_string($connection,$_POST["firstname"]);
   $middlename = mysqli_real_escape_string($connection,$_POST["middlename"]);
   $lastname = mysqli_real_escape_string($connection,$_POST["lastname"]);
   $username = mysqli_real_escape_string($connection,$_POST["username"]);
   $password = mysqli_real_escape_string($connection,$_POST["password"]);
   $cpassword = mysqli_real_escape_string($connection,$_POST["cpassword"]);
   $email = mysqli_real_escape_string($connection,$_POST["email"]);
   $gender = mysqli_real_escape_string($connection,$_POST["gender"]);
   
   // $sql = "SELECT *FROM login";
   $sql = "INSERT INTO login( firstname, middlename, lastname, username, password, confirmpassword, email, gender ) 
   VALUES ('{$firstname}','{$middlename}','{$lastname}','{$username}', '{$password}', '{$cpassword}','{$email}','{$gender}')";
   mysqli_query($connection,$sql);
    // header ("Location:../form3_.php?singup=sucess" );
    }
}
// $result = mysqli_query($connection,$sql);
// don't use dat one or uncomment below one
// $check = mysqli_num_rows($result);
// if ($check > 0) {
	// while($row = mysqli_fetch_assoc($result)){
		// echo $row ['firstname']."<br>";
	// }
// }
// don't use dat one or uncomment above^ one
// to check if in selection table database is working
// if (!$result){
	// die("database query failed ");
// }
// echo "<ul>";
// while ($row = mysqli_fetch_assoc($result)){
	// echo "<pre>";
	// var_dump($row);
	// echo "<hr>";
	
	// echo "<li>".$row["firstname"] ."</li>";
// }
// echo "</ul>";

// release return data
// mysqli_free_result($result);

mysqli_close($connection);
?>