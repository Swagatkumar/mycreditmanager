<?php
session_start();
?>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    session_unset();
    session_destroy();
    header("Location: http://localhost/index/index.php");
    ?>
</body>
</html>