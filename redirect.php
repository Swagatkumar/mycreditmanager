<?php
session_start();
?>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    $_SESSION["username"]=$_GET["un"];
    header("Location: http://localhost/index/transfer.php");
    ?>
</body>
</html>