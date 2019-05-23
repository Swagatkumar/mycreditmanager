<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="css/list.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    $conn=new mysqli('localhost','root','','demo');
    if (isset($_SESSION["username"])){
        if (isset($_SESSION["receiver"])){
            $result=$conn->query("select * from user where username='".$_SESSION["receiver"]."'");
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $conn->autocommit(false);
                    $senderupdate=$_SESSION["atsender"]-$_SESSION["amount"];
                    $receiverupdate=$row["credit"]+$_SESSION["amount"];
                    $result1=$conn->query("update user set credit=".$senderupdate." where username='".$_SESSION["username"]."'");
                    $result2=$conn->query("update user set credit=".$receiverupdate." where username='".$_SESSION["receiver"]."'");
                    if($result1!==TRUE){
                        echo "Transaction Failed";
                        $conn->rollback();
                        $conn->rollback();
                    }else{
                        if($result2!==TRUE){
                            echo "Transaction Failed";
                            $conn->rollback();
                            $conn->rollback();
                        }else{
                            echo "Transaction successfull";
                            $conn->query("insert into transfer (sentfrom,sentto,amount,time,date) values ('".$_SESSION["username"]."','".$_SESSION["receiver"]."',".$_SESSION["amount"].",time_format(current_time(),'%r'),date_format(current_date(),'%e-%m-%Y %W'))");
                            session_unset();
                            session_destroy();
                            echo "<a href='index.php'>Exit</a>";
                        }
                    }
                }
            }
        }else{
            echo "<div class='invalid'>Your transaction is not initiated.</div>";
            echo "<a style='margin-left:35%;font-size:20px;color:#3d6eff' href='transfer.php'>Back to Profile</a>";
        }
    }else{
        echo "<div class='invalid'>You are logged out</div>";
        echo "<a style='margin-left:35%;font-size:20px;color:#3d6eff' href='index.php'>Exit</a>";
    }
    ?>
</body>
</html>