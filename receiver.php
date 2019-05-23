<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="css/list.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    $conn=new mysqli('localhost','root','','demo');
    if(isset($_SESSION["username"])){
        if(isset($_POST["amount"])){
            $result=$conn->query("select * from user where username='".$_SESSION["username"]."'");
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    if($_POST["amount"]>$row["credit"]){
                        echo "<div class='invalid'>You don't have that amount.</div>";
                        echo "<a style='margin-left:35%;font-size:20px;color:#3d6eff' href='transfer.php'>Back to Profile</a>";
                    }else{
                        $_SESSION["amount"]=$_POST["amount"];
                        $_SESSION["atsender"]=$row["credit"];
                        echo "<form action='rlist.php' method='post'>";
                        echo "<input class='transferamount' type='text' name='search' placeholder='Enter receiver username' autofocus required/>";
                        echo "</form><br>";
                        echo "<a style='margin-left:30%;font-size:20px;color:#ff8875' href='rlist.php'>Or Select from the list</a>";
                    }
                }
            }
        }else{
            echo "<div class='invalid'>Please enter a amount first</div>";
            echo "<a style='margin-left:35%;font-size:20px;color:#3d6eff' href='transfer.php'>Back to Profile</a>";
        }
    }else{
        header("Location: http://localhost/index/transfered.php");
    }
    ?>
</body>
</html>