<?php 
include 'core/init.php';
include 'inc/header.php'; 

$currency_1_id  = $_REQUEST['c1'];
$currency_2_id  = $_REQUEST['c2'];
$start_date     = $_REQUEST['startdate'];
$end_date     = $_REQUEST['enddate'];
$graph_type     = 'calculation';
 
include 'inc/form.php';

if (isset($_REQUEST['c1'])) {
    include 'inc/graph.php';
}

include 'inc/footer.php'; 
?>
