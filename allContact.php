<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fit World</title>
        <link rel="stylesheet" href="styles/bootstrap.min.css" type="text/css">
        <link href="styles/style.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="images/icon.png">
        <script src="styles/jquery.min.js"></script>
        <script src="styles/bootstrap.min.js"></script>
        <style>
            .mem h2{
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div id="contact" class="footer">
            <h2>
                REQUEST CONTACTS
            </h2>
            <div id="banner">
                <div class="container">
                    <table class="memTable" align="center">
                        <tr>
                            <th>
                                ID 
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Mobile No
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Subject
                            </th>
                        </tr>
                        <?php
                        //database connecet
                        $server = "localhost";
                        $username = "root";
                        $pw = "1234";
                        $database = "gym";
                        $port = "3306";

                        //insert data
                        $con = new mysqli($server, $username, $pw, $database, $port);
                        $query = "SELECT * from contact order by idcontact desc";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_row($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $row[0];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row[1];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row[2];
                                        ?>
                                    </td>
                                    <td>

                                        <?php
                                        echo $row[3];
                                        ?>

                                    </td>
                                    <td> 

                                        <?php
                                        echo $row[4];
                                        ?>

                                    </td>
                                    <td> 

                                        <?php
                                        echo $row[5];
                                        ?>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>

                <div>
                    <form method="Poet" action="../database/database.php">
                        <input type="file" name="image">
                        <input type="submit" name="submit" value="Upload">
                    </form> 
                </div>
                </body>  
                </html>
