<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

function get_all_currency_names() {
	return mysql_query("SELECT * FROM `currency`");
}

function get_min_date() {
	return mysql_result(mysql_query("SELECT MIN(`date`) as date FROM `fxrates` WHERE `currency_id` = 1"), 0, 'date');
}

function get_max_date() {
	return mysql_result(mysql_query("SELECT MAX(`date`) as date FROM `fxrates` WHERE `currency_id` = 1"), 0, 'date');
}

function get_wocu_id() {
	return mysql_result(mysql_query("SELECT `id` FROM `currency` WHERE `name` = 'XCU'"), 0, 'id');
}

function get_currency_name($currency_id) {
	return mysql_result(mysql_query("SELECT `name` FROM `currency` WHERE `id` = $currency_id"), 0, 'name');
}

function get_timeline_data($currency_id, $start_date, $end_date) {
	return mysql_query("SELECT r.`date`, r.`rate` FROM `fxrates` r WHERE r.`currency_id` = $currency_id AND (r.date >= '$start_date' AND r.date <= '$end_date')");
}

function format_timeline_data($data) {
	$i = 0;
	
	while($row = mysql_fetch_array($data)) {
		
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


function calculation($currency_id_1, $currency_id_2, $start_date, $end_date) {
	
	$c1 = get_timeline_data($currency_id_1, $start_date, $end_date);
	$c2 = get_timeline_data($currency_id_2, $start_date, $end_date);

	$count = mysql_num_rows($c1);

	$i = 0;

	while ($row = mysql_fetch_array($c1)) {
		$results[$i]['date'] = $row['date'];
		$results[$i]['c1'] = $row['rate'];
		$i++;
	}

	$i = 0;

	while ($row = mysql_fetch_array($c2)) {
		$results[$i]['c2'] = $row['rate'];
		$i++;
	}


	for ($i=0; $i < $count; $i++) { 
		$results[$i]['A'] = $results[$i]['c1'] / $results[$i]['c2'];
	}

	for ($i=0; $i < $count; $i++) { 
		$results[$i]['B'] = $results[$i]['A'] / $results[0]['A'];
	}


	return $results;
}


function format_calc_data($data) {
	$count = count($data);
	
	for ($i=0; $i < $count; $i++) { 
		
		$shortDate = $data[$i]['date'];
		$timestamp = strtotime($shortDate);
		
		$value = $data[$i]['B'];

		$results_array[$i]['x'] = $timestamp;
		$results_array[$i]['y'] = $value;

    }

    $output = json_encode($results_array);
	$output = (string)$output;
	$output = str_replace('"', '', $output);

	return $output;
}

?>