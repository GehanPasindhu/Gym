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
        <link rel="stylesheet" href="styles/logincss.css" type="text/css">
        <link rel="icon" href="images/icon.png">
    </head>
    <body>
        <div id="back">
            <div class="row">
                <div class="wrapper">
                    <form action="nextpage.php" method="POST" >
                        <div class="container col-sm-3 col-sm-push-3">
                            <h3 class="form-signin-heading">MAKE YOUR MEMBERSHIP</h3>
                            <hr class="colorgraph"><br>
                            <input type="text" placeholder="Name" name="name" autofocus="" class="form-control"><br>
                            <input type="text" placeholder="Date Of Birth" name="dob" class="form-control"><br>
                            <input type="text" placeholder="Mobile No" name="tp"class="form-control"><br>
                            <input type="text" placeholder="NIC" name="nic"class="form-control"><br>
                            <input type="text" placeholder="Email" name="email"class="form-control"><br>
                            <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            </select>
                            <select id="membershiptype" name="memebershipType">
                            <option value="Full Memberships">Full Memberships</option>
                            <option value=" DAYTIME WORKOUT "> DAYTIME WORKOUT </option>
                            <option value=" NON-PEAK WORKOUT "> NON-PEAK WORKOUT </option>
                            </select>
                            <br> <br>
                            <input type="password" placeholder="Password" name="pass" class="form-control"><br>
                            <button class="btn btn-primary">Create Membership</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
