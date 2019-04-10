<?php
 //  echo "<pre>";
    // echo print_r($_FILES);
    //  echo "<pre>";
$max = 4000*1024;
$message  ="";
if (isset($_POST['upload'])) {
    $fileName = $_FILES['file']['name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

   if (in_array($fileActualExt, $allowed)){
      if ($_FILES['file']['error'] == 0 ) {
         $fileTmpName = $_FILES['file']['tmp_name'];
         $fileName = $_FILES['file']['name'];
         $fileDestination = 'uploads/'. $fileName;

        move_uploaded_file($fileTmpName, $fileDestination);
        $message  = $_FILES['file']['name'].' <span style = "color:green";>was upload succsessful</span>';
     
        }
      } else {

    switch ($_FILES['file']['error']) {
         case 2:
             $message  = $_FILES['file']['name'].' <span style = "color:red";>is too big</span>';
             break;
          case 4:
             $message  = $_FILES['file']['name'].' <span style = "color:red";>No file selected</span>';
             break;
         default:
             $message  = $_FILES['file']['name'].' <span style = "color:red";>sorry that type of file is not allowed</span>';
             break;
           }
    }
 
}

?>