<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="css/list.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    $conn=new mysqli('localhost','root','','demo');
    if(isset($_SESSION["username"])){
        if(isset($_SESSION["amount"])){
            if($_POST){
                $sql = "SELECT username,email FROM user where username like '".$_POST["search"]."%'";
            }else{
                $sql = "SELECT username,email FROM user";
            }
            $result = $conn->query($sql);
            ?>
            <div style="overflow:hidden;background-color:#3399ff">
                <p class="logo">My Credit Manager</p>
            </div><br><br><br><br><br>
            <?php
            if ($result->num_rows > 0) {
            ?>
                <div style="border:1px solid #0478B3;margin-left:10%;margin-right:10%">
                <div style='overflow:hidden;background-color:#246bb2;font-family: "Heebo", sans-serif;'>
                <h2 style='width:30%;float:left;margin-left:30%;color:white'>User Name</h2>
                <h2 style='float:left;color:white'>Email</h2>
                </div>
                <?php
                $count=0;   
                while($row = $result->fetch_assoc()) {
                    if($row["username"]!=$_SESSION["username"]){
                        if($count%2!==0){
                            echo "<div style='overflow:hidden;background-color:#333333;padding:10px'>
                            <a href='redirect2.php?recv={$row["username"]}'>
                            <span class='username'>".$row["username"]."</span>
                            <span class='email'>".$row["email"]."</span>
                            </a>
                            </div>";
                        }else{
                            echo "<div style='overflow:hidden;padding:10px'>
                            <a href='redirect2.php?recv={$row["username"]}'>
                            <span class='username'>".$row["username"]."</span>
                            <span class='email'>".$row["email"]."</span>
                            </a>
                            </div>";
                        }
                        $count++;
                    }
                }
            }
        }else{
            echo "<div class='invalid'>Please enter a amount</div>";
            echo "<a style='margin-left:35%;font-size:20px;color:#3d6eff' href='transfer.php'>Back to Profile</a>";
        }
    } else {
        header("Location: http://localhost/index/transfered.php");
    }
    ?>
</body>
</html>