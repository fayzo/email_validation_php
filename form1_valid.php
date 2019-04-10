<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $usernameErr = $passwordErr = $cpasswordErr = $genderErr= $emailErr = $middlename ="";
$firstname = $lastname = $username = $password = $cpassword = $email =  $middlenameErr = "";
$user = 'root'; $password = ''; $db = 'upand_running'; $host = '127.0.0.1'; $port = 3308;

$conn = mysqli_connect(
   $host, $user, $password, $db, $port
);

if (mysqli_connect_errno()){
	die("database connection failed:" .mysqli_connect_error().
	"(".mysqli_connect_errno().")"
	);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
    $middlename = mysqli_real_escape_string($conn,$_POST["middlename"]);
    $gender = mysqli_real_escape_string($conn,$_POST["gender"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn,$_POST["cpassword"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
	
    if (empty($_POST["firstname"])) {
        $firstnameErr = '<span style="color:red;">is required</span>';
    }else if( isset($_POST["firstname"])){
		$firstname = test_input($_POST["firstname"]);
		$firstnameErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';
	   if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            $firstnameErr = "Only letters and white space allowed";
        }
	}
    
    if (empty($_POST["middlename"])) {
        $middlenameErr = " is required";
    }else if (isset($_POST["middlename"])){
		$middlename = test_input($_POST["middlename"]);
		$middlenameErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';
		if (!preg_match("/^[a-zA-Z ]*$/", $middlename)) {
            $middlenameErr = "Only letters and white space allowed";
        }
	}
       

    if (empty($_POST["lastname"])) {
        $lastnameErr = " is required";
    }else if (isset($_POST["lastname"])){
		$lastname = test_input($_POST["lastname"]);
		$lastnameErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';	   
	   if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            $lastnameErr = "Only letters and white space allowed";
        }
	}

    if (empty($_POST["gender"]) && $_POST["gender"] == ""){
		 $genderErr = '<span class="error">is required</span>';
     }
	
	
    if (empty($_POST["username"])) {
        $usernameErr = "is required";
    }else if (isset($_POST["username"])){
		$username = test_input($_POST["username"]);
		$usernameErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';	    
		if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $usernameErr = "Only letters and white space allowed";
        }
	}
    
    if (empty($_POST['password']) && $_POST['cpassword'] == "" ) {
        $passwordErr = '<span class ="error">is required</span>';
        $cpasswordErr = '<span class ="error">is required</span>';
    } else if ($_POST['password'] !== $_POST["cpassword"]) {
        $password = test_input($_POST["password"]);
		// password don't match with confirmation password
        $cpasswordErr ='<span style = "color:red;"><i class="fas fa-check"></i></span>';
		
		 if (!preg_match("/^[a-zA-Z ]*$/", $password)) {
            $passwordErr = "<span class='error'>Only letters and white space allowed</span>";
        }
    } else if ($_POST['password'] == $_POST["cpassword"]){
      //  success page here
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        $passwordErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';
        $cpasswordErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';
	     
		 if (!preg_match("/^[a-zA-Z ]*$/", $password)) {
            $passwordErr = "Only letters and white space allowed";
        }
	}
	
    
    if (empty($_POST["email"])) {
        $emailErr = "<span class='error'>is required</span>";
    }else if (isset($_POST["email"])){
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		$emailErr = '<span style = "color:green;"><i class="fas fa-check"></i></span>';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "<span class='error'> is invalid </span>";
        }
	}
	
	if(!empty($firstname) && !empty($lastname ) && !empty($middlename) && 
	!empty($gender) && !empty($username) && !empty($password) && !empty($cpassword) && !empty($email) ){
    //    $sql ="INSERT INTO fom1( firstname, middlename,lastname,gender,username,password,cpassword,email) 
    //    VALUES ('{$firstname}','{$lastname}','{$middlename}','{$gender}','{$username}','{$password}','{$cpassword}','{$email}')";
    //    mysqli_query($success,$sql);
    //    header ("Location: form1_.php?singup=sucess" );
	   $sql = "INSERT INTO `fom1`( `firstname`, `middlename`, `lastname`, `gender`, `username`, `password`, `cpassword`, `email`)
	   VALUES ('{$firstname}','{$lastname}','{$middlename}','{$gender}','{$username}','{$password}','{$cpassword}','{$email}')";
       mysqli_query($conn,$sql);
    //    header ("Location:form1_.php?singup=sucess" );
	}
  }
	
mysqli_close($conn);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
