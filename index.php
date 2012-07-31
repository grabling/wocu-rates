<?php 
include 'core/init.php';
include 'inc/header.php'; 

$currency_1_id = $_POST['c1'];
$currency_2_id = $_POST['c2'];
$start_date = $_POST['period']
?> 

<h1>Home</h1>
<?php 
include 'inc/form.php';

if ($_GET['t'] == 'graph') {
    include 'inc/graph.php';
}
?>

      
<?php include 'inc/footer.php'; ?>