<?php include 'valid.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link   href="dist/bootstrap.min.css" rel="stylesheet">
    <title>login document</title>
    <style>.error{color:red};</style>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <fieldset>
    <legend> Reset Email:</legend>

    your E-mail:<br>
    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="your email" autofocus>
    <span class="error"><?php echo $emailErr; ?></span>
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
    <script src="dist/jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>

</body>
</html>
