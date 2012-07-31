<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

function get_all_currency_names() {
	return mysql_query("SELECT * FROM `currency` ORDER BY `name` ASC");
}

?>