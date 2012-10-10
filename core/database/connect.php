<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/* Database config */

// $hostname = 'localhost';
// $username='root';
// $password='root';
// $dbname='wocu';


$hostname = 'localhost';
$username='root';
$password='aEE8vkyp';
$dbname='wocu';

/* End config */

$link = mysql_connect($hostname, $username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);

mysql_query("SET names UTF8");
?>
