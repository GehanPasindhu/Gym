<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['data'])) {
    header("Location: membership.php");
}elseif(isset($_SESSION['name'])) {
    header("Location: admin.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fit World</title>
        <link rel="stylesheet" href="styles/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="styles/logincss.css" type="text/css">
        <link rel="icon" href="images/icon.png">
    </head>
    <body>
        <div id="back">
            <div class="row">
                <div class="wrapper">
                    <form action="admin.php" method="POST" >
                        <div class="container col-sm-3 col-sm-push-3">
                            <h3 class="form-signin-heading">Welcome Back</h3>
                            <hr class="colorgraph"><br>
                            <input type="text" placeholder="User Name" name="un" autofocus="" class="form-control"><br>
                            <input type="password" placeholder="Password" name="pw" class="form-control"><br>
                            <a href="signUp.php">Not A Member?</a><br><br>
                            <button name="log" class="btn btn-primary">Click Here</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
