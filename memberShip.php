<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_GET["na"])) {

    $name = $_GET["name"];
    $email = $_GET["email"];
    $mobileNo = $_GET["mobileNo"];
    $city = $_GET["city"];
    $subject = $_GET["subject"];

    //database connecet
    $server = "localhost";
    $username = "root";
    $pw = "1234";
    $database = "gym";
    $port = "3306";

    //insert data
    $conn = new mysqli($server, $username, $pw, $database, $port);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO contact (name, email, mobileNo, city, subject)
                            VALUES ('$name', '$email', '$mobileNo','$city','$subject')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("Location: memberShip.php");
    mysqli_close($conn);
} elseif (isset($_GET["shad"])) {

    $name = $_GET["name"];
    $mobileNo = $_GET["mobileNo"];
    $city = $_GET["date"];
    $subject = $_GET["time"];

    //database connecet
    $server = "localhost";
    $username = "root";
    $pw = "1234";
    $database = "gym";
    $port = "3306";

    //insert data
    $conn = new mysqli($server, $username, $pw, $database, $port);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO  scheduleit (name, mobileNo, date, time)
                            VALUES ('$name','$mobileNo','$city','$subject')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("Location: memberShip.php");
    mysqli_close($conn);
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
                            <li><a href="#schedule">MAKE YOUR SCHEDULE</a></li>                           
                            <li><a href="#packages">PACKAGES</a></li>
                            <li><a href="#whatWeDo">ABOUT</a></li>
                            <li><a href="#contact">CONTACT US</a></li>
                            <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
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

        <div id="schedule">
            <div id="banner">
                <h3>
                    Make Your Schedule
                </h3>
                <div class="container">
                    <form action="memberShip.php?shad" method="GET">
                        <input class="form-control" type="text" id="name" name="name" placeholder="Name:">
                        <br> <br>
                        <input class="form-control" type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No:">
                        <br> <br>
                        <input class="form-control" type="date" id="date" name="date" placeholder="Date:">
                        <br> <br>
                        <input class="form-control" type="time" id="time" name="time" placeholder="Time:">
                        <br> <br>   
                        <input type="submit" name="shad" value="Submit">
                        <br> <br>
                    </form>
                </div>
            </div>
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
                        <td><img src=images/pack_tick.png" class="img-responsive" alt="yes"></td>
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
                Contact Us
            </h2>
            <p>
                Register with us for a free one hour work out and get a first-hand experience of our 
                dynamic and professional fitness training offered to you and your loved ones.
            </p>
            <div id="banner">
                <div class="container">
                    <form action="memberShip.php?na" method="GET">
                        <input class="form-control" type="text" id="fname" name="name" placeholder="Name:">
                        <br> <br>
                        <input type="text" id="email" name="email" placeholder="Email:">
                        <br> <br>
                        <input type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No:">
                        <br> <br>
                        <select id="city" name="city">
                            <option value="kandana">Kandana</option>
                            <option value="welisara">Welisara</option>
                            <option value="ragama">Ragama</option>
                            <option value="nugegoda">Nugegoda</option>
                            <option value="maharagama">Maharagama</option>
                        </select>
                        <br> <br>
                        <textarea id="subject" name="subject" placeholder="Message:" style="height:200px"></textarea>
                        <br> <br>
                        <input type="submit" name="na" value="Submit">
                        <br> <br>
                    </form>
                </div>
            </div>
            <div class="copy">
                &COPY;All rights reserved | Design by <span><b>GEHAN PASINDHU</b></span>

            </div>
        </div>
    </body>
</html>
