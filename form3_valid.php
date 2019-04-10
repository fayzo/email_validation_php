
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
// define variables and set to empty values
$firstnameErr = $lastnameErr = $usernameErr = $passwordErr = $cpasswordErr = $genderErr= $emailErr = $middlenameErr ="";
$firstname = $lastname = $username = $password = $cpassword = $email = $gender= $middlename = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $firstname = mysqli_real_escape_string($connection,$_POST["firstname"]);
   $middlename = mysqli_real_escape_string($connection,$_POST["middlename"]);
   $lastname = mysqli_real_escape_string($connection,$_POST["lastname"]);
   $username = mysqli_real_escape_string($connection,$_POST["username"]);
   $password = mysqli_real_escape_string($connection,$_POST["password"]);
   $cpassword = mysqli_real_escape_string($connection,$_POST["cpassword"]);
   $email = mysqli_real_escape_string($connection,$_POST["email"]);
   $gender = mysqli_real_escape_string($connection,$_POST["gender"]);

    if (empty($_POST["firstname"])) {
        $firstnameErr = '<span style="color:red;"><i class = "fa fa-app-store-ios fa-xm" ></i>* First name is required</span>';
    }else {
        $firstname = test_input($_POST["firstname"]);
        $firstnameErr = '<span class ="fa fa-app-store">* ok</span>';
           // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            $firstnameErr = "Only letters and white space allowed";
        }
    }
    
    if (empty($_POST["middlename"])) {
        $middlenameErr = "* Middle name is required";
    }else {
        $middlename = test_input($_POST["middlename"]);
    // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $middlename)) {
            $middlenameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "* Last name is required";
    }else {
        $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            $lastnameErr = "Only letters and white space allowed";
        }
    }

     if (empty($_POST["gender"]) && $_POST["gender"] == ""){
	 	 $genderErr = '<span class="error">pls select ur gender</span>';
     }


    if (empty($_POST["username"])) {
        $usernameErr = "* username is required";
    }else {
        $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $username = "Only letters and white space allowed";
        }
    }
   
    if (empty($_POST["password"]) && $_POST["cpassword"] == '') {
		$passwordErr = "* password is required";
        $cpasswordErr = "* password is required";
    } 
     elseif($_POST["password"]!== $_POST["cpassword"]){
		$password = test_input($_POST["password"]);
        $cpasswordErr = "* your password doesn't match";
		 if (!preg_match("/^[a-zA-Z ]*$/", $password)) {
			 $password = '';
		     $cpassword = '';
            $passwordErr = "Only letters and white space allowed";
        }
    // check if name only contains letters and whitespace
        
    }else{
		$password = test_input($_POST["password"]);
		$cpassword = test_input($_POST["cpassword"]);
	}

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    
    if(!empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($username) 
    && !empty($password) && !empty($cpassword) && !empty($email) && !empty($gender)){
     // $sql = "SELECT *FROM login";
    $sql = "INSERT INTO login( firstname, middlename, lastname, username, password, confirmpassword, email, gender) 
    VALUES ('{$firstname}','{$middlename}','{$lastname}','{$username}', '{$password}',
    '{$cpassword}','{$email}','{$gender}')";
    mysqli_query($connection,$sql);
    // header ("Location:../form3_.php?singup=sucess" );
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
mysqli_close($connection);
?>
