<!doctype html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="css/list.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    $conn=new mysqli('localhost','root','','demo');
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
        if($count%2!==0){
            echo "<div style='overflow:hidden;background-color:#333333;padding:10px'>
                <a href='redirect.php?un={$row["username"]}'>
                    <span class='username'>".$row["username"]."</span>
                    <span class='email'>".$row["email"]."</span>
                </a>
            </div>
            ";
        }else{
            echo "<div style='overflow:hidden;padding:10px'>
                <a href='redirect.php?un={$row["username"]}'>
                    <span class='username'>".$row["username"]."</span>
                    <span class='email'>".$row["email"]."</span>
                </a>
            </div>
            ";
        }
        $count++;
    }
    } else {
        echo "0 results";
    }
    ?>
    </div>
</body>
</html>