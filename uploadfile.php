<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    // print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileSize = $_FILES['file']['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew ;
                move_uploaded_file($fileTmpName, $fileDestination);
                header('location:upload.php?uploadsuccess');
            } else {
                echo 'you file is too big!';
            }
            # code...
        } else {
            echo ' there was an error uploading your file';
        }
        # code...
    } else {
        # code...
        echo ' you cannot upload this type';
    }

}
?>