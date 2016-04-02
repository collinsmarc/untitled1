<?php session_start(); ?>

<html>

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
            <div id='resultsdiv'>
                <?php

                //header("Location:results.html");

                error_reporting(-1);

                $dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
                $username = "b52b6c6935c6d2";
                $password = "26ebeed0";
                try {
                    $conn = new PDO($dsn, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }

                $query = "";

                $title = $_POST['title'];
                if (!isset($title)) {
                    $title = $_POST['qsearch'];
                        if (!isset($title)) {
                            $title = '%';
                        }
                }

                $platform = $_POST['platform'];
                if (!isset($platform)) {
                    $platform = '%';
                }

                $genre = $_POST['genre'];
                if (!isset($genre)) {
                    $genre = '%';
                }

                $year = $_POST['year'];
                if (!isset($year)) {
                    $year = '%';
                }

                $query = "SELECT * FROM gameCollection WHERE Title LIKE '%$title%' AND Platform Like '$platform' AND Genre Like '%$genre%' AND Year Like '%$year%' ORDER BY Title";
                try {
                    $results = $conn->query($query);

                    if ($results->rowcount() == 0) {
                        echo "no games found <br />";
                    } else {

                        print "<table id='results'>\n";
                        echo "<th>Title</th><th>Platform</th><th>Genre</th><th>Year</th><th id='age'>Age Rating</th><th id='desc'>Description</th><th>Borrow</th>";
                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["Title"] . "</td>";
                            echo "<td>" . $row["Platform"] . "</td>";
                            echo "<td>" . $row["Genre"] . "</td>";
                            echo "<td>" . $row["Year"] . "</td>";
                            echo "<td>" . $row["Age Rating"] . "</td>";
                            echo "<td>" . $row["Description"] . "</td>";
                            echo "<td><form id='borrow' action='borrow.php' method='post'><input id='borrow' type='submit' name='Borrow' value='Borrow'></form></td>";
                        }
                        print "</table>\n";
                    }
                } catch (PDOException $e) {
                    echo "Query failed: " . $e->getMessage();
                }
                $conn = null;

                ?>
            </div>
        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>
</html>


