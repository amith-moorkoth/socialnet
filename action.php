<?php   
error_reporting(0);
                                                                
$_SERVER['REQUEST_URI']=strtolower($_SERVER['REQUEST_URI']);
$_SERVER['PHP_SELF']=strtolower($_SERVER['PHP_SELF']);
$_SERVER['HTTP_REFERER']=strtolower($_SERVER['HTTP_REFERER']);
                 
$err=0;
if($_SERVER['REQUEST_URI']==$site_self){$err=1;}
if($_SERVER['PHP_SELF']==$site_self){$err=1;}
if($_SERVER['HTTP_REFERER']==$site_self){$err=1;}

if($err==0){header('Location: index.php');}

?>
