<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

function get_all_currency_names() {
	return mysql_query("SELECT * FROM `currency` ORDER BY `name` ASC");
}

function get_currency_name($currency_id) {
	return mysql_result(mysql_query("SELECT `name` FROM `currency` WHERE `id` = $currency_id"), 0, 'name');
}

function get_timeline_data($currency_id, $start_date) {
	return mysql_query("SELECT r.`date`, r.`rate` FROM `fxrates` r WHERE r.`currency_id` = $currency_id AND r.date > '$start_date'");
}

function format_timeline_data($data) {
	$i = 0;
	while($row = mysql_fetch_array($data)){
		
		$shortDate = $row['date'];
		$timestamp = strtotime($shortDate);
		
		$value = $row['rate'];

		$results_array[$i]['x'] = $timestamp;
		$results_array[$i]['y'] = $value;

		$i++;
    }

    $output = json_encode($results_array);
	$output = (string)$output;
	$output = str_replace('"', '', $output);

	return $output;
}

?>