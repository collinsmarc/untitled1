<?php session_start(); ?>


            <?php

            error_reporting(-1);

            $dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
            $username = "b52b6c6935c6d2";
            $password = "26ebeed0";
            try {
                $conn = new PDO($dsn, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(!isset($_SESSION['username'])) {
                $sql = "";

                $stuno = $_POST['username'];

                $password = $_POST['password'];


                $sql = "SELECT * FROM members WHERE studentID = $stuno AND password = '$password'";

                try {
                    $results = $conn->query($sql);

                    if ($results->rowcount() == 0) {
                        echo "Login details incorrect<br />";
                    } else {
                        echo "Logged in as $stuno";

                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = "$stuno";
                        header("Location:memberSite.php");

                    }
                } catch (PDOException $e) {
                    echo "Query failed: " . $e->getMessage();
                }
            } else {
            session_start();
 unset($_SESSION["username"]);
 unset($_SESSION["password"]);
session_destroy();


header("Location:index.html");
 }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;
            ?>
