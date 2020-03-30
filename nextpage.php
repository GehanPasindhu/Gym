<?php

session_start();
//database connecet
$server = "localhost";
$username = "root";
$pw = "1234";
$database = "gym";
$port = "3306";
//insert data
$link = new mysqli($server, $username, $pw, $database, $port);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM `members` WHERE `name`='" . $_POST['name'] . "'";
echo $query;
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) < 1) {
    $query = "INSERT INTO `members` (`name`,`dob`,`tp`,`nic`,`email`,`gender`,`password`,`memebershipType`) VALUES('".$_POST['name']."','".$_POST['dob']."','".$_POST['tp']."','".$_POST['nic']."','".$_POST['email']."','".$_POST['gender']."','".$_POST['pass']."','".$_POST['memebershipType']."')";
    echo $query;
    mysqli_query($link, $query);
    $_SESSION['username']=$_POST['name'];
    header("Location: admin.php");
}
