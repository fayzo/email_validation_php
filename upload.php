<?php include 'uploadfiles.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link   href="dist/bootstrap.min.css" rel="stylesheet">
    <title>upload file</title>
</head>
<body>
<div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method='post' enctype='multipart/form-data' >
       <div class="form-group">
            <label for="file">File input :</label><?php echo " ".$message ; ?>
            <input type="hidden" name="MAX_FILE_SIZE" value ="<?php echo $max;?>">
            <input type="file" name="file"  class="form-control-file">
            <small id="fileHelp" class="form-text text-muted">Max 3mb size</small>
            <button type="submit" name="upload" class="btn btn-primary">upload</button>
        </div>
    </form>
</div>

    <script src="dist/jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>

</body>
</html>