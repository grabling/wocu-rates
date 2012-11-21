<div class="well">
	<div class="row-fluid">
		<form action="index.php" method="GET">
			<div class="span12">
				<div class="span3">
					<?php echo 'Volatility since '.$start_date; ?>
				</div>
				<div class="span3">
					<?php echo get_currency_name($currency_1_id) .'/'. get_currency_name($currency_2_id);?>
					<?php $result1 = calculation_stddev($currency_1_id, $currency_2_id, $start_date, $end_date); ?>
					<?php echo ' '. $result1 .'%' ; ?>
				</div>
				<div class="span3">
					<?php echo 'XCU/'. get_currency_name($currency_2_id); ?>
					<?php $result2 = calculation_stddev(get_wocu_id(), $currency_2_id, $start_date, $end_date); ?>
					<?php echo ' '. $result2 .'%' ; ?>
				</div>
				<div class="span3">
					<?php echo 'Reduction '; ?>
					<?php echo round(((($result1 - $result2) / $result1)*100),2) .'%' ;?>
				</div>
			</div>
		</form>
	</div>
</div>

