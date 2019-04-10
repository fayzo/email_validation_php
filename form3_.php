<?php include 'form3_valid.php';?>
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
    <style>.error{color:red};</style>
</head>
<body>
  <!-- bootstrap forms rows -->
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <fieldset>
        <legend>Register Personal information:</legend>
        <div class="form-row has-error has-feedback">
          <div class="col-lg-3-md-3-sm-6">
             <label class="font-weight-normal sr-only" class="sr-only">Normal Text</label>
              First Name: 
              <input type="text" name="firstname" value="<?php echo $firstname; ?>"class="form-control "  placeholder="First name" >
              <span><?php echo $firstnameErr; ?></span><br>
              Middle Name:
              <input type="text" name="middlename" value="<?php echo $middlename; ?>"class="form-control" placeholder="Middle name">
              <span class="error"><?php print $middlenameErr; ?></span><br>
              Last Name:
              <input type="text" name="lastname" value="<?php echo $lastname; ?>"class="form-control" placeholder="Last name">
              <span class="error" ><?php echo $lastnameErr; ?></span><br>
              Gender 
              <select id="gender" name ="gender" class="form-control">
                
                  <option value = "" >select ur gender</option>
				  
                  <option value="female"
                  <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female") {
                    echo "selected";
                  } ?> >Female</option>
				  
                  <option value="male"
                  <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male") {
                    echo "selected";
                  } ?> >Male</option><br>
              </select>
              <span ><?php echo $genderErr; ?></span><br>
           </div>
           <div class="col-lg-3-md-3-sm-6">
             Username:
            <input type="text" name="username" value="<?php echo $username; ?>"class="form-control" placeholder="username" >
            <span class="error"><?php echo $usernameErr; ?></span><br>
            Password: 
            <input type="text" name="password" value="<?php echo $password; ?>"class="form-control" placeholder="password" >
            <span class="error"><?php echo $passwordErr; ?></span><br>
            Confirm password: 
            <input type="text" name="cpassword" value="<?php echo $cpassword; ?>"class="form-control" placeholder="confirm password" >
            <span class="error"><?php echo $cpasswordErr; ?></span><br>
             E-mail:
            <input type="text" name="email" value="<?php echo $email; ?>"class="form-control" placeholder="your email" >
            <span class="error"><?php echo $emailErr; ?></span>
          </div>
        </div>
     </fieldset><br>
	  <input type="submit" class="btn btn-primary" name ="Submit" value="Submited"><br>
        <p>Already a member? <a href='login.php'> sign in</a></p>
        <p>upload <a href='upload.php'> file</a></p>
    </form>
  </div>
 <?php echo print_r($_POST);?>
    <script src="dist/jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
</body>
</html>
