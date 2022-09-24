<?php
// checking if the parameters were passed through POST method
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name = $_POST['userName'];
    $phoneNumber = $_POST['userPhNum'];
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "urban_classics";

    // creating a connection
    $conn = mysqli_connect($serverName,$userName,$password,$database);
    if(!$conn) {
        $output = "We are facing some technical issues and your details were not 
        submitted to us successfully. Please try again later. We regret the 
        inconvenience caused";
    } else {
        // inserting record into contact_us table
        $sql = "INSERT INTO CONTACT_US(NAME,PHNUM) VALUES ('$name',$phoneNumber)";
        // executing the query
        $result = mysqli_query($conn,$sql);
        // $result stores true or false depending on whether the execution was success
        // checking if the record insertion happened successfully
        if ($result) {
            $output = "Your details were submitted to us successfully. Our team will
            get in touch with you shortly.";
        } else {
            $output = "We are facing some technical issues and your details were not 
            submitted to us successfully. Please try again later. We regret the 
            inconvenience caused";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Classics - Redefining Men's Fashion</title>
    <link rel="stylesheet" href="css/style-form-submit.css">
</head>
<body>
    <div>
        <img src="./img/company-logo-img/logo.png" alt="Urban Classic's logo">
        <p><?php echo "$output"; ?></p>
        <button><a href="./index.html">Return To Home</a></button>
    </div>
</body>
</html>