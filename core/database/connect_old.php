<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/* Database config */

$hostname = '127.0.0.1';
$username='root';
$password='root';
$dbname='wocu';

/* End config */

$link = mysql_connect($hostname, $username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);

mysql_query("SET names UTF8");
?>
