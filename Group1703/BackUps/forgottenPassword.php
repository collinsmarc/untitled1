<html>

<head>
    <link rel="stylesheet" type="text/css" href="../design.css"/>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><strong><font size="20">GameShare RGU</font></strong></h1>
        </div>
        <div id="search">
            <Form Name ="login" action="../login.php" method="post">
                <div id="logintext">
                    <font size="-2"><label for="username">Username :</label><input id="username" name="username" type="text" size="-2"/><label for="Password">Password :</label><input id="password" name="password" type="password" size="-2"/></font><input class="form-submit" type="submit" value="Login" />
                    <a id="register" href="Register.html">Not a member? Register.</a>
                </div>
            </form>
        </div>
        <div id="menu">
            <form action="../results.php" method="post">
                <ul>
                    <li><a href="../index.html">Homepage</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="search.html">Search</a></li>
                    <li><input id="qsearch" name="qsearch" type="text" placeholder="I want to borrow..."/><input id="qsgo" type="submit"  value="Go"></li>
                </ul>
            </form>
            <br class="clearfix" />
        </div>
    </div>
    <div id="page">
        <div id="content">

            <?php

            error_reporting(-1);

            $dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
            $username = "b52b6c6935c6d2";
            $password = "26ebeed0";
            try {
                $conn = new PDO($dsn, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "";

                $stuno = $_POST['pstuno'];

                $email = $_POST['pemail'];

                $sql = "SELECT password FROM members WHERE studentID = '$stuno' AND email = '$email'";
                $results = $conn->query($sql);

            if ($results->rowcount() == 0) {
                echo "No members were found to match those details.<br />";
            } else {

                $encrypt = md5(1290*3+$Results['studentID']);
                $message = "Your password reset link send to your e-mail address.";
                $to=$email;
                $subject="Forget Password";
                $from = 'Gameshare';
                $body='Hi, <br/> <br/>Your Membership ID is '.$Results['studentID'].' <br><br>Click here to reset your password http://marcwebs.azurewebsites.net/Group1703/reset.php'.$encrypt.'&action=reset   <br/> <br/>--<br>Gameshare<br>Solve your problems.';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                mail($to,$subject,$body,$headers);
            }

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;
            ?>
        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>
</html>