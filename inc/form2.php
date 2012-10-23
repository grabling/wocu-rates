<div class="well span3">
	<div class="row-fluid">
		<form action="index.php" method="GET">
			<div class="span12">
				<div class="span12"><h6> <?php echo 'Volatility since '.$start_date; ?></h6></div>
			</div>
			<div class="span12">	
				<div class="span6"> <?php echo get_currency_name($currency_1_id) .'/'. get_currency_name($currency_2_id); ?></div>
				<div class="span6">55%</div>
			</div>
			<div class="span12">
				<div class="span6"> <?php echo 'XCU/'. get_currency_name($currency_2_id); ?></div>
				<div class="span6">8.85%</div>
			</div>
			<div class="span12">
				<div class="span6"><h6>Reduction</h6></div>
				<div class="span6">76.50%</div>
			</div>
		</form>
	</div>
</div>

