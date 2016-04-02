<?session_start();
if(!isset($_SESSION['username'])){
header("Location:index.html");
}?>

<!DOCTYPE html>


<head>
    <link rel="stylesheet" type="text/css" href="design.css"/>
    <link rel="stylesheet"
          href="unsemantic-grid-responsive-tablet.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
</head>


<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><strong><font size="20">GameShare RGU</font></strong></h1>
        </div>


<div id="menu">
    <form action="results.php" method="post">
        <ul>
            <li><a href="index.html">Homepage</a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="Search.php">Search</a></li>
            <li><input id="qsearch" name="qsearch" type="text" placeholder="I want to borrow..."/><input id="qsgo"
                                                                                                         type="submit"
                                                                                                         value="Go">
            </li>
        </ul>
    </form>
    <br class="clearfix"/>
</div>
    </div>
    <div id="page">
        <div id="content">


            <main class="grid container">
                <section class="grid-65" section id="content1">
                    <article id="welcome">
                        <h2>Welcome Back <?echo $_SESSION['username'];?></h2>
                        <h3>What would you like to do today?</h3>

                        <p><a href="#">Change Password</a></p>
                        <form name="logout" action="logout.php" method="post">
                            <input id="logoutButton" type="submit" type="submit" value="Log Out">
                            </form>
                        </article>
                </section>


                <section class="grid-35" section id="content2">
                    <h3>Your Titles</h3>
                    <a href="addTitlePlatform.php">Add Title</a>
                    <br><br><br><br><br><br>
                    <h3>Your Loans</h3>

                </section>
            </main>

        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>
</html>





