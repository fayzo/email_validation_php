<?php 

 $errors = [];
 $missing = [];
 if (isset($_POST['submit'])){
     $expected = ['firstname','middlename','lastname','username','gender','password', 
     'username','password','confirmpassword', 'E_mail'];
     $required = ['firstname', 'middlename', 'lastname', 'username','gender', 'password' ,
     'username','password','confirmpassword', 'E_mail'];
	 
	 require './form2valid.php';
 }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link   href="dist/bootstrap.min.css" rel="stylesheet">
    <link   href="font_awesome_icon/all.css" rel="stylesheet">
    <link   href="font_awesome_icon/all.js" rel="stylesheet">
    <title>Document</title>
    <style>.error{color:red;}.textz{color:red;font-size:14px;};</style>
</head>
<body>
  <!-- bootstrap forms rows -->
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <fieldset>
        <legend>Register Personal information:
	      <?php if ($errors || $missing):?>
		  <span><small class='error h6'>Please indicate missing form</small></span>
		  <?php endif; ?>
		</legend>
           <div class="form-row ">
              <div class="col-lg-3-md-6-xm-3">

                <labeL class ='sr-only' for="firstname" >First Name: </label><label>
			      <?php if ($missing && in_array('firstname', $missing)) {
                  echo "<small class='textz'>Please enter your Firstname ?</small>";
                  }elseif (isset($_POST['firstname'])){
                  echo "<small style='color:green;font-size:14px;'>Firstname </small>";
                  };?></labeL>
                  <input type="text" name="firstname" class="form-control "  placeholder="First name"  
                  <?php if ($errors || $missing) {
                        echo 'value ="' . htmlentities($firstname) . '"';
                 }
                 ?>
                  >

			    <labeL class ='sr-only'>Middle Name: </label><label>
                  <?php if ($missing && in_array('middlename', $missing)) {
                  echo "<small class='textz'>Please enter your Middlename ?</small>";
                  }elseif (isset($_POST['middlename'])){
                  echo "<small style='color:green;font-size:14px;'>Middlename </small>";
                  };?>
			      </labeL>
                  <input type="text" name="middlename" class="form-control" placeholder="Middle name" 
                  <?php if ($errors || $missing) {
                  echo  'value ="' . htmlentities($middlename) . '"';
                 }
                 ?>
                 >
                <labeL class ='sr-only'>last Name:  </label><label>
			      <?php if ($missing && in_array('lastname', $missing)){
                  echo "<small class='textz'>Please enter your Lastname ?</small>";
                  }elseif (isset($_POST['lastname'])){
                  echo "<small style='color:green;font-size:14px;'>Lastname </small>";
                  }; ?>
			      </labeL>
                  <input type="text" name="lastname" class="form-control" placeholder="Last name"
                  <?php if ($errors || $missing) {
                  echo  'value ="' . htmlentities($lastname) . '"';
                 }
                 ?>
                  >
                <label class ='sr-only'>Gender: </label><label>
                   <?php if ($missing && in_array('gender', $missing)){
                  echo "<small class='textz'>Please enter your gender ?</small>";
                  }elseif (isset($_POST["gender"])){
                  echo "<small style='color:green;font-size:14px;'>Gender</small>";
                  }; ?>
			       </labeL>
                   <select id="gender" name ="gender" class="form-control" >
                   <option value ="" 
                   <?php if (!$_POST || $gender == '') {
                       echo "selected";
                   }
                   ?>
                   >select ur gender</option>
                   <option value ="Female"
                    <?php if ($_POST && $gender == 'Female') {
                        echo "selected";
                    }
                    ?>
                    >Female</option>
                   <option value ="Male"
                    <?php if ($_POST && $gender == 'Male') {
                        echo "selected";
                    }
                    ?>
                    >Male</option> 
                   </select>
              </div>

              <div class="col-lg-3-md-6-xm-3">

                 <label class ='sr-only'>Username: </label><label>
			        <?php if ($missing && in_array("username", $missing)){
                  echo "<small class='textz'>Please enter your username ?</small>";
                  }elseif (isset($_POST["username"])){
                  echo "<small style='color:green;font-size:14px;'>username</small>";
                  }; ?>
			        </label>
                    <input type="text" name="username" class="form-control" placeholder="username" 
                    <?php if ($errors || $missing) {
                    echo  'value ="' . htmlentities($username) . '"';
                   }
                   ?>
                    >
                <label class ='sr-only'>Password:  </label><label>
			        <?php if ($missing && in_array("password", $missing)){
                  echo "<small class='textz'>Please enter your password ?</small>";
                  }elseif (isset($_POST["password"])){
                  echo "<small style='color:green;font-size:14px;'>Password</small>";
                  }; ?>
			        </label>
                    <input type="password" name="password" class="form-control" placeholder="password" 
                     <?php if ($errors || $missing) {
                    echo  'value ="' . htmlentities($password) . '"';
                   }
                   ?>
                    >
                <label class ='sr-only'>Confirm password:  </label><label>
			         <?php if ($missing && in_array("confirmpassword", $missing)){
                     echo "<small class='textz'>Please enter your Confirmation Password ?</small>";
                     }elseif ($_POST && $password !== $confirmpassword) {
                     echo "<small class='textz'>Please Your Password don't match ?</small>";
                      } ?>
			         </label>
                     <input type="password" name="confirmpassword" class="form-control" placeholder="confirm password" 
                       <?php if ($errors || $missing) {
                       echo 'value ="' . htmlentities($confirmpassword) . '"';
                      } ?>
                       >
                <label class ='sr-only'>E-mail:  </label><label>
                     <?php if ($missing && in_array('E_mail', $missing)){
                     echo "<small class='textz'>Please enter your E_mail ?</small>";
                     }elseif (isset($_POST["E_mail"])){
                     echo "<small style='color:green;font-size:14px;'>E_mail</small>";
                     }; ?>
			         </labeL>
                     <input type="email" name="E_mail" class="form-control" placeholder="your email" 
                    <?php if ($errors || $missing) {
                         echo 'value ="' . htmlentities($E_mail) . '"';
                     }
                     ?>
                     >
               </div>
		       <div class="col-lg-3-md-6-xm-3">
			      <?php echo "<pre>" ;?>
                  <?php echo print_r($_POST);?>
                  <?php echo "<pre>" ;?>
			   </div>
         </div>
             
     </fieldset><br>
	  <!-- <input type="submit"  name ="Submit" value="Submited"><br> -->
       <input type="submit" name="submit" class="btn btn-primary">
        <p>Already a member? <a href='login.php'> sign in</a></p>
        <p>upload <a href='upload.php'> file</a></p>
    </form>
  </div>
    <script src="dist/jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
</body>
</html>
 