<?php
define('INCLUDE_CHECK',true);

session_start();
error_reporting(0);

require 'database/connect.php';
require 'config.php';

$page = $_SERVER['SCRIPT_NAME'];
?>