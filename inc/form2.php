<div class="well span3">
	<div class="row-fluid">
		<form action="index.php" method="GET">
			<div class="span12">
			   <h1>
				<div class="span12"><?php echo 'Volatility since '.$start_date; ?></div>
			   </h1>
			</div>
			<div class="span12">	
			   <h1>
				<div class="span6"> <?php echo get_currency_name($currency_1_id) .'/'. get_currency_name($currency_2_id); ?></div>
				<div class="span6">55%</div>
			   </h1>
			</div>
			<div class="span12">
			   <h1>
				<div class="span6"> <?php echo 'XCU/'. get_currency_name($currency_2_id); ?></div>
				<div class="span6">8.85%</div>
			   </h1>
			</div>
			<div class="span12">
			   <h2>
				<div class="span6">Reduction</div>
				<div class="span6">50%</div>
			   </h2>
			</div>
		</form>
	</div>
</div>

