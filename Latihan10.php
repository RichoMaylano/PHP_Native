<?php 
session_start();

$_SESSION['username']="richo";
$_SESSION['nim']="m0518045";
$_SESSION['univ']="UNS";

echo $_SESSION['username']."<br>";
echo $_SESSION['nim']."<br>";
echo $_SESSION['univ'];


?>