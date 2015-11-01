<?php
session_start();
include 'ClassSessions.php';
echo date_default_timezone_get();
$obj=new ClassSessions();
echo ClassSessions::sessionSettor(); 
print_r($_POST);
echo '$_SERVER["REMOTE_ADDR"];     '.$_SERVER['REMOTE_ADDR'];
echo '$_SERVER["HTTP_X_FORWARDED_FOR"];     '.$_SERVER['HTTP_X_FORWARDED_FOR'];
echo '$_SERVER["HTTP_CLIENT_IP"];     '.$_SERVER['HTTP_CLIENT_IP'];
?>