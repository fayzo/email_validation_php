<?php include 'form1_valid.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link   href="dist/bootstrap.min.css" rel="stylesheet">
    <link href="google_icons.css" rel="stylesheet">

    <!-- <link   href="fontawesome_5_4/css/fontawesome.css" rel="stylesheet">
    <link   href="fontawesome_5_4/css/solid.css" rel="stylesheet">
    <link   href="fontawesome_5_4/css/regular.css" rel="stylesheet">
    <link   href="fontawesome_5_4/css/brands.css" rel="stylesheet"> -->
    <!-- <link   href="fontawesome_5_4/css/all.css" rel="stylesheet"> -->

    <!-- <script src="fontawesome_5_4/js/fontawesome.js"></script>
    <script src="fontawesome_5_4/js/solid.js"></script>
    <script src="fontawesome_5_4/js/regular.js"></script>
    <script src="fontawesome_5_4/js/brands.js"></script> -->
    <script src="fontawesome_5_4/js/all.js"></script>

    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
  
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="jquery_3_3.js"></script>
    <title>Document</title>
    <style>.error{color:red};</style>
</head>
<body>
<i class="material-icons green">home</i>
<i class="material-icons">home</i>
<i class="material-icons"style='color:green;'>check</i>

<i class="fab fa-font-awesome"></i>
<i class="fa fa-cog fa-spin"></i>
<i class="fas fa-check"></i>
<i class="fal fa-ghost"></i>
<i class="far fa-ghost"></i>
<i class="fas fa-ghost"></i>
<i class="fas fa-user"></i> <!-- uses solid style -->
  <i class="fab fa-github-square"></i> <!-- uses brand style -->
<i class="fa fa-home "></i>
<i class="fa fa-graduation-cap d-block"></i>
<i class="fas fa-user"></i> <!-- uses solid style -->
<i class="far fa-user"></i> <!-- uses regular style -->
<i class="fa fa-user"></i> <!-- uses regular style -->
<span style="font-size: 3em; color: Tomato;">
  <i class="fas fa-ghost"></i>
</span>
<span style="font-size: 48px; color: Dodgerblue;">
  <i class="fas fa-ghost"></i>
</span>

<span style="font-size: 3rem;">
  <span style="color: Mediumslateblue;">
  <i class="fas fa-ghost"></i>
  </span>
</span>

<span><i class="material-icons"> done_outline</i></span>

  <!-- bootstrap forms rows -->
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <fieldset>
        <legend>Register Personal information:<span><i class="material-icons">home</i></span></legend>
        <div class="form-row has-error has-feedback">
          <div class="col-lg-3-md-6-sm-12-xm-12">
             <label class="font-weight-normal sr-only" class="sr-only">Normal Text</label>
              First Name: <span><?php echo ' '.$firstnameErr; ?></span><br>
              <input type="text" name="firstname" value="<?php echo $firstname; ?>"class="form-control "  placeholder="First name" >
              <br>
              Middle Name:<span class="error"><?php echo' '.$middlenameErr; ?></span><br>
              <input type="text" name="middlename" value="<?php echo $middlename; ?>"class="form-control" placeholder="Middle name">
              <br>
              Last Name:<span class="error" ><?php echo ' '.$lastnameErr; ?></span><br>
              <input type="text" name="lastname" value="<?php echo $lastname; ?>"class="form-control" placeholder="Last name">
              <br>
              Gender:<span class="error"><?php echo ' '.$genderErr; ?></span>
			  
              <select id="gender" name ="gender" class="form-control">
                
                  <option value = "" >select ur gender</option>
				  
                  <option value="female"
                  <?php if (isset($_POST["gender"])&& $_POST["gender"] == "female") {
                    echo "selected";
                  } ?> >Female</option>
				  
                  <option value="male"
                  <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male") {
                    echo "selected";
                  } ?> >Male</option><br>
              </select>
              
           </div>
		 
           <div class="col-lg-3-md-6-sm-12-xm-12">
		   
            <label id='username' onkeyup='check_username ()'></label>Username:<span class="error"><?php echo ' '.$usernameErr; ?></span><br>
            <input type="text" name="username"  value="<?php echo $username; ?>"class="form-control" placeholder="username" >
            <br>
			
            Password:<span ><?php echo ' '.$passwordErr; ?></span><br>
            <input type="text" name="password" id="password"  onkeyup='check()' value="<?php echo $password; ?>"class="form-control" placeholder="password" >
            <br>
			
		        Re-enter password:<span ><?php echo ' '.$cpasswordErr; ?></span><span id='message'></span><br>
            <input type="text" name="cpassword" id="cpassword"  onkeyup='check()' value="<?php echo $cpassword; ?>"class="form-control" placeholder="confirm password" >
             <br>
			 
             E-mail:<span ><?php echo ' '.$emailErr; ?></span><br> 
            <input type="text" name="email" value="<?php echo $email; ?>"class="form-control" placeholder="your email" >
            

          </div>
		  <div class="col-lg-3-md-6-xm-3">
			      <?php echo "<pre>" ;?>
                  <?php echo print_r($_POST);?>
                  <?php echo "<pre>" ;?>
			   </div>
        </div><br>
        <input type="submit" name ="submit" class="btn btn-primary" value="Submit">
         <img src="img/ic_add_alert_black_18dp.png" alt="black">
        <img src="img/ic_warning_black_36dp.png" alt="warning">
         
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <path d="M0 0h48v48H0z" fill="none"/>
            <path d="M34 21v-7c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v20c0 1.1.9 2 2 2h24c1.1 0 2-.9 2-2v-7l8 8V13l-8 8z"/>
        </svg><br>
        <p>Already a member? <a href='login.php'> sign in</a></p>
     </fieldset>
        <p>upload <a href='upload.php'> file</a></p>
    </form>
  </div>
   <script>
    feather.replace()
    </script>
    <script src="dist/jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    
    <script>
    //  this is for jquery for checking if it is match with confirmation
    //  $('#password, #cpassword').on('keyup', function () {
    //  if ($('#password').val() == $('#cpassword').val()) {
    //      $('#message').html('Matching').css('color', 'green');
    //  } else 
    //      $('#message').html('Not Matching').css('color', 'red');
    //  });

    //  this is for javascripts for checking if it is match with confirmation
      var check = function() {
        if (document.getElementById('password').value == document.getElementById('cpassword').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = '<span ><svg aria-hidden="true" data-prefix="far" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path></svg></span> ';
        } else {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = '<span ><svg aria-hidden="true" data-prefix="far" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"></path></svg>not matching</span> ';
        }
      }

     </script>
</body>
</html>