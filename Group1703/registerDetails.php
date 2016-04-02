<?session_start();
if(isset($_SESSION['username'])){
    header("Location:index.html");
}?>




<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="design.css"/>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><strong><font size="20">GameShare RGU</font></strong></h1>
        </div>
        <div id="search">
            <Form Name ="login" action="login.php" method="post">
                <? if(!isset($_SESSION['username'])){
                    echo '
                    <font size="-2"><label for="username">Username :</label><input id="username" name="username" type="text" size="-2"/><label for="Password">Password :</label><input id="password" name="password" type="password" size="-2"/></font><input class="form-submit" type="submit" value="Login" />
                    <a id="register" href="registerDetails.php">Not a member? Register.</a>
               ';}
                else{
                    echo "Logged in as: ".$_SESSION['username'];
                    echo ' <form name="logout" action="logout.php" method="post">
                            <input id="logoutButton" type="submit" type="submit" value="Log Out">
                            </form>';
                }




                ?>
            </form>
        </div>
        <div id="menu">
            <form action="results.php" method="post">
                <ul>
                    <li><a href="index.html">Homepage</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="Search.php">Search</a></li>
                    <li><input id="qsearch" name="qsearch" type="text" placeholder="I want to borrow..."/><input id="qsgo" type="submit"  value="Go"></li>
                </ul>
            </form>
            <br class="clearfix" />
        </div>
    </div>
    <div id="page">
        <div id="content">
            <table  style="width:300px" >
                <form  name="Register" Method ="post" action = "register.php">
                    <tr>
                        <td><label for="Fname">First Name :</label></td>
                        <td><input id="Fname" name="Fname" type="text"/></td>
                    </tr>
                    <td><label for="Sname">Surname :</label></td>
                    <td><input id="Sname" name="Sname" type="text"/></td>
                    <tr>
                        <td><label for="email">Email :</label></td>
                        <td><input id="email" name="email" type="email"/></td>
                    </tr>
                    <tr>
                        <td><label for="Cemail">Confirm Email :</label></td>
                        <td><input id="Cemail" name="Cemail" type="email"/></td>
                    </tr>
                    <tr>
                        <td><label for="stuno">Student Number :</label></td>
                        <td><input id="stuno" name="stuno" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label for="Epassword">Password :</label></td>
                        <td><input id="Epassword" name="Epassword" type="password"/></td>
                    </tr>
                    <tr>
                        <td><label for="Cpassword">Confirm Password :</label></td>
                        <td><input id="Cpassword" name="Cpassword" type="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit"  value="Register">

                        </td>
                    </tr>
                </form>
            </table>
        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>


</html>