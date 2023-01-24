<?php

session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);
echo header("location: login.php");
?>