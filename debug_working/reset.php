<?php
session_start(); //forgot to start session before destroying
session_destroy();
?>
<html>
<head><title>Reseting Accounts</title></head>
<body>
Accounts Reset.
<?php include("menu.php"); ?>
</body>
</html>
