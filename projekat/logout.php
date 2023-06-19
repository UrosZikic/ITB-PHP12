<?php
session_start();
session_Unset(); //$_SESSION = array();
session_destroy();

header("Location: index.php");
?>