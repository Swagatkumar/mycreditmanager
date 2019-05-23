<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Credit Manager</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Heebo|Quicksand&display=swap" rel="stylesheet">  
</head>
<body>
    <div class="main">
        <div class="lefttside">
            <p class="welcome">Welcome to</p>
            <p class="welcome-small">My Credit Manager</p>
        </div>
        <div class="rightside"><br><br>
            <form action="list.php" method="post">
            <input type="text" class="searchbox" name="search" placeholder="Enter a user name" spellcheck="false" autofocus required/>
            </form><br><br>
            <a href="list.php">Or View the full list of users</a>
        </div>
    </div>
</body>
</html>