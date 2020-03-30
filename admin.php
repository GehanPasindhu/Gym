<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
if (isset($_POST['log'])) {
    $query = "SELECT * FROM `members` WHERE `name`='" . $_POST['un'] . "'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['data'] = $row;
        header("Location: membership.php");
    } else {
        if ($_POST['un'] = "admin" && $_POST['pw'] = "123") {
            $_SESSION['name'] = "admin";
        }
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
}
?>
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
        <div id="home">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="#">FITWorld</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#schedule">REQUEST SCHEDULES</a></li>                                                   
                            <li><a href="#contact">REQUEST CONTACTS</a></li>
                            <li><a href="#members">MEMBERS</a></li>
                            <li><a href="#packages">PACKAGES</a></li>
                            <li><a href="#whatWeDo">ABOUT</a></li>
                            <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <div id="banner">
                <h3>
                    Our Memberships
                </h3>
                <div>
                    <h2>
                        1
                    </h2>
                    <h4>
                        Full Memberships
                        <br> 
                        <span>
                            05.00 AM - 10.00 PM
                        </span>
                    </h4>
                    <p>
                        Excellent choice for busy corporate executives to walk in any 
                        time for the work out, for those who are unable to exercise during 
                        the morning and daytime and for those who prefer to end the day with an energising work out.
                    </p>
                    <a href="#packages" class="dtl_btn">Details</a>
                    <h2>
                        2
                    </h2>
                    <h4>
                        DAYTIME WORKOUT 
                        <br> 
                        <span>
                            05.00 AM - 05.00 PM
                        </span>
                    </h4>
                    <p>
                        Ideal for those wanting to stay active throughout the 
                        day with an early work out, for those who work late hours 
                        and are too tired to work out in the evening, for those who are early birds and for those who 
                        work flexi hours.
                    </p>
                    <a href="#packages" class="dtl_btn">Details</a>
                    <h2>
                        3
                    </h2>
                    <h4>
                        NON-PEAK WORKOUT 
                        <br> 
                        <span>
                            09.00 AM - 05.00 PM
                        </span>
                    </h4>
                    <p>
                        Most suitable for housewives, senior citizens, businessmen and students.
                    </p>
                    <a href="#packages" class="dtl_btn">Details</a>
                </div>
            </div>
        </div>
        <div id="schedule" class="mem">
            <h2>
                 Request Schedules 
            </h2>
            <table class="memTable" align="center">
                <tr>
                    <th>
                        ID 
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Mobile No
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Time
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
                $query = "SELECT * from (SELECT * from scheduleit order by date desc)as `x` order by time desc LIMIT 0,20";
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
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <p><a href="request.php">View All</a></p>
        </div>
        <div id="packages" class="mem">
            <h2>
                Packages
            </h2>
            <div id="banner">
                <h4>Full Membership</h4>
                <table class="memTable" >
                    <tr>
                        <th>Packages</th>
                        <th>ladies Only</th>
                        <th>Student Only</th>
                        <th>All</th>
                        <th>Membership Rate</th>
                        <th>Introductory Rate</th>
                    </tr>
                    <tr>
                        <td>
                            Life time
                        </td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td> <img src="images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td>Rs.  1,000,000.00</td>
                        <td>Rs.  1,000,000.00</td>
                    </tr>
                    <tr>
                        <td>Executive Ladies Mem(Full)</td>
                        <td> <img src=images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td>Rs.  5,625.00</td>
                        <td>Rs.  5,625.00</td>
                    </tr>
                    <tr>
                        <td>Executive  Mem(Full)</td>
                        <td> <img src=images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td>Rs.  7,500.00</td>
                        <td>Rs.  7,500.00</td>
                    </tr>
                    <tr>
                        <td>GX Ladies Membership (35 years and below)</td>
                        <td> <img src=images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td>Rs.  5,000.00</td>
                        <td>Rs.  5,000.00</td>
                    </tr>
                    <tr>
                        <td>Day Workout</td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td>Rs.  1,000.00</td>
                        <td>Rs.  1,000.00</td>
                    </tr>
                    <tr>
                        <td>GX Ladies Membership (35 years and below)</td>
                        <td> <img src=images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td>Rs.  5,000.00</td>
                        <td>Rs.  5,000.00</td>
                    </tr>
                </table>
                <br>
                <br>
                <h4>Non-Peack Membership</h4>
                <table class="memTable">
                    <tr>
                        <th>Packages</th>
                        <th>ladies Only</th>
                        <th>Student Only</th>
                        <th>All</th>
                        <th>Membership Rate</th>
                        <th>Introductory Rate</th>
                    </tr>
                    <tr>
                        <td>
                            Non - Peak Executive
                        </td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td> <img src="images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td>Rs.  3,750.00</td>
                        <td>Rs.  3,750.00</td>
                    </tr>
                    <tr>
                        <td>Masters Membership Over 60 Y</td>

                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td> <img src=images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td>Rs. 4,000.00</td>
                        <td>Rs.  4,000.00</td>
                    </tr>
                    <tr>
                        <td>Non- Peak Lady Executive</td>
                        <td><img src="images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td> <img src=images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>

                        <td>Rs.  3,000.00</td>
                        <td>Rs.  3,000.00</td>
                    </tr>
                </table>   
                <br>
                <br>
                <h4>other</h4>
                <table class="memTable">
                    <tr>
                        <th>Packages</th>
                        <th>ladies Only</th>
                        <th>Student Only</th>
                        <th>All</th>
                        <th>Membership Rate</th>
                        <th>Introductory Rate</th>
                    </tr>
                    <tr>
                        <td>
                            Students (18 years and under)
                        </td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>
                        <td> <img src="images/pack_tick.png" class="img-responsive" alt="yes"></td>
                        <td><img src="images/pack_close.png" class="img-responsive" alt="no"></td>

                        <td>Rs.  3,000.00</td>
                        <td>Rs.  3,000.00</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="members" class="mem">
            <h2>
                Members
            </h2>
            <div id="banner">
                <table class="memTable" align="center">
                    <tr>
                        <th>
                            Membership ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            DOB
                        </th>
                        <th>
                            Mobile No
                        </th>
                        <th>
                            NIC
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Membership Type
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
                    $query = "SELECT idmembers, name,dob, tp, nic, email, gender, memebershipType from members LIMIT 0,25";
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
                                <td> 

                                    <?php
                                    echo $row[6];
                                    ?>

                                </td>
                                <td> 

                                    <?php
                                    echo $row[7];
                                    ?>

                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <p><a href="allmembers.php">View All</a></p>
            </div>
        </div>
        <div id="whatWeDo" class="about">
            <h2>
                About Us
            </h2>
            <div id="banner"> 
                <h4> MY BEST LIFE </h4>
                <p>
                    Providing a quality health care service and giving our members control 
                    over their health is paramount at all Fit World gyms. We help members 
                    prevent and overcome degenerative diseases, achieve their optimum fitness goals, 
                    realize personal lifestyle development objectives and rehabilitate them into good health. 
                    This is accomplished by designing exercise programs which are effective, efficient and motivational. 
                    All of these health care services are being delivered by a team of well trained, committed and passionate
                    professionals, whilst being managed and guided by some of the most 
                    qualified and respected experts of the health care and fitness industry
                </p>

                <h4> OUR VISION </h4>
                <p>
                    Empowering people in 100 nations to realize their best life
                </p>

                <h4>
                    OUR MISSION 
                </h4>
                <p>
                    To extend lives, restore good health and enhance physical fitness levels of members so as to 
                    nurture them to have a devoted heart, a purposeful soul and a courageous mind.  
                </p>
            </div>
        </div>
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
                        $query = "SELECT * from contact order by idcontact desc LIMIT 0,10";
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
                    <p><a href="allContact.php">View All</a></p>
                </div>
            </div>
            <div class="copy">
                &COPY;All rights reserved | Design by <span><b>GEHAN PASINDHU</b></span>
            </div>
        </div>
    </body>
</html>
