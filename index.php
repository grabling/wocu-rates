<?php 
include 'core/init.php';
include 'inc/header.php'; 

$currency_1_id  = $_POST['c1'];
$currency_2_id  = $_POST['c2'];
$start_date     = $_POST['period'];
$graph_type     = $_POST['type'];
 
include 'inc/form.php';

if ($_GET['t'] == 'graph') {
    include 'inc/graph.php';
}

include 'inc/footer.php'; 
?>