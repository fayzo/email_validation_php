
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
<?php
$flavors = array('Vanilla','Chocolate','Rhinoceros');
// Set up empty defaults when nothing is chosen.
$defaults = array('name' => '',
                   'age' => '',
                   'flavor' => array());
foreach ($flavors as $flavor) {
	$defaults['flavor'][$flavor] = '';
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$errors = array();
include __DIR__ . '/showform.php';
} else {
// The request is a POST, so validate the form
$errors = validate_form();
if (count($errors)) {
// If there were errors, redisplay the form with the errors,
// preserving defaults
if (isset($_POST['name'])) { $defaults['name'] = $_POST['name']; }
if (isset($_POST['age'])) { $defaults['age'] = "checked='checked'"; }
foreach ($flavors as $flavor) {
if (isset($_POST['flavor']) && ($_POST['flavor'] == $flavor)) {
$defaults['flavor'][$flavor] = "selected='selected'";
}
}
include __DIR__ . '/showform.php';
} else {
// The form data was valid, so congratulate the user. In "real life"
// perhaps here you'd redirect somewhere else or include another
// file to display
print 'The form is submitted!';
}
function validate_form() {
global $flavors;
// Start out with no errors
$errors = array();
// name is required and must be at least 3 characters
if (! (isset($_POST['name']) && (strlen($_POST['name']) > 3))) {
$errors['name'] = 'Enter a name of at least 3 letters';
}
if (isset($_POST['age']) && ($_POST['age'] != '1')) {
$errors['age'] = 'Invalid age checkbox value.';
}
// flavor is optional but if submitted must be in $flavors
if (isset($_POST['flavor']) && (! in_array($_POST['flavor'], $flavors))) {
$errors['flavor'] = 'Choose a valid flavor.';
}
return $errors;
}
?>
</form>
    <script src="dist/jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
</body>
</html>
 <?php echo "pre" .print_r($_POST);?>