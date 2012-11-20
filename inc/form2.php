<div class="well offset9" style="height: 80%;">
	<div class="row-fluid">
		<form action="index.php" method="GET">
			<div class="span12">
				<div class="span12"><?php echo 'Volatility since '.$start_date; ?></div>
			</div>
			<div class="span12">	
				<div class="span6"><?php echo get_currency_name($currency_1_id) .'/'. get_currency_name($currency_2_id);?></div>
				<?php $result1 = calculation_stddev($currency_1_id, $currency_2_id, $start_date, $end_date); ?>
				<div class="span6"><?php echo $result1 .'%' ; ?></div>
			</div>
			<div class="span12">
				<div class="span6"><?php echo 'XCU/'. get_currency_name($currency_2_id); ?></div>
				<?php $result2 = calculation_stddev(get_wocu_id(), $currency_2_id, $start_date, $end_date); ?>
				<div class="span6"><?php echo $result2 .'%' ; ?></div>
			</div>
			<div class="span12">
				<div class="span6">Reduction</div>
				<div class="span6"><?php echo round(((($result1 - $result2) / $result1)*100),2) .'%' ;?></div>
			</div>
		</form>
	</div>
</div>

