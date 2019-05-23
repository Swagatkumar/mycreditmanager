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
    <style>
        #transfer{
            display:none;
        }
        #history{
            display:none;
        }
    </style>
    <script>
        function openTransfer(){
            document.getElementById("transfer").style.display="block";
            document.getElementById("history").style.display="none";
        }
        function openHistory(){
            document.getElementById("transfer").style.display="none";
            document.getElementById("history").style.display="block";
        }
    </script>
</head>
<body>
    <p class="logo" style="margin-left:0px">My Credit Manager</p>
    <?php
    $conn=new mysqli('localhost','root','','demo');
    if(isset($_SESSION["username"])){
        $result=$conn->query("select * from user where username='".$_SESSION["username"]."'");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<span class='hellouser'>Hello, ".$row["username"]."</span>";
                echo "<span class='helloemail'>".$row["email"]."</span><br><br><br><br><br>";
                echo "<span class='amount'>Your credit amount is: <span style='color: #0d9e3d'>".$row["credit"]."</span></span><br><br>";
            }
        }
        ?>
        <button class="Transfer" onclick="openTransfer()"> Transfer Credit </button>
        <button class="History" onclick="openHistory()"> History </button>
        <div id="transfer">
        <form action="receiver.php" method="post">
            <input type="number" class="transferamount" name="amount" placeholder="Enter amount to be transfered" autofocus required/>
        </form>
        </div>
        <div id="history">
        <?php
        $transferd=$conn->query("select * from transfer where sentfrom='".$_SESSION["username"]."' or sentto='".$_SESSION["username"]."'");
        if($transferd->num_rows>0){
            while($rows=$transferd->fetch_assoc()){
                if($rows["sentfrom"]===$_SESSION["username"]){
                    echo "<div class='hcontent'>";
                    echo "<div style='float:left'>".$rows["amount"]."&nbsp;&nbsp;&nbsp sent to&nbsp;&nbsp;&nbsp ".$rows["sentto"]."&nbsp;&nbsp;&nbsp ".$rows["time"]."</div>";
                    echo "<div style='float:right'>".$rows["date"]."</div>";
                    echo "</div>";
                }else{
                    echo "<div class='hcontent'>";
                    echo "<div style='float:left'>".$rows["amount"]."&nbsp;&nbsp;&nbsp; recieved from&nbsp;&nbsp;&nbsp; ".$rows["sentfrom"]."&nbsp;&nbsp;&nbsp; ".$rows["time"]."</div>";
                    echo "<div style='float:right'>".$rows["date"]."</div>";
                    echo "</div>";
                }
            }
        }else{
            echo "<div class='invalid'>No transaction found</div>";
        }
    }else{
        header("Location: http://localhost/index/transfered.php");
    }
    ?>
    </div>
</body>
</html>