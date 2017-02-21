<?php
$site_name="Govt Engineering College Barton Hill";
$link = mysql_connect('localhost', 'root', '');
$site_self="/gecbh/index.php";
$site_url="http://localhost/gecbh/index.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meetwebs";

mysql_select_db($dbname); 
/*if($_SERVER['PHP_SELF']!=$site_url."form_check.php"){
if(isset($_COOKIE["user"])){if($_COOKIE["user"]=="admin"){if($_SERVER['PHP_SELF']!=$site_url."admin.php"){header('Location: admin.php');}}
elseif($_SERVER['PHP_SELF']!=$site_url."dashboard.php"){header('Location: dashboard.php');}}   
}*/

                                 
?>
