<?php
session_start();
?>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    $_SESSION["receiver"]=$_GET["recv"];
    header("Location: http://localhost/index/transfered.php");
    ?>
</body>
</html>