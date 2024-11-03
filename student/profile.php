<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');

    if(str($SESSION['stlogin'])==0){
        header("location:../home/home.php");
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php } ?>