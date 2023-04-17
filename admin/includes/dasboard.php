<?php
session_start();
$username=$_SESSION['name'];
?>
<center><h2> Welcome<?php echo $user;?> to be the dasboard </h2></center>
<center><h3><a href='logout.php'>logout</a><h3></center>