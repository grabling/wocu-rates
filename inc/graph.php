<div class="well offset4">
	<div class="row-fluid">
	   <div>
		<h1>
		   <?php if ($graph_type == 'calculation'){echo 'Historical Baseline Volatility';} else {echo 'Historical FX Rates';} ?>
		</h1>
		<div id="chart"></div>
		<div id="legend"></div>
	   </div>
	</div>

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

<script>
	// Get currency 1 data
	var data1 = 
	<?php
	    // Call for data
		if ($graph_type == 'calculation' ) {
	    	echo format_calc_data(calculation($currency_1_id, $currency_2_id, $start_date, $end_date));  
	    }
	    else {
	    	echo format_timeline_data(get_timeline_data($currency_1_id, $start_date, $end_date));
	    }
	?>
	;

	// Get currency 2 data
	var data2 = 
	<?php
	    // Call for data
	    if ($graph_type == 'calculation' ) {
	    	echo format_calc_data(calculation(get_wocu_id(), $currency_2_id, $start_date, $end_date)); 
	    }
	    else {
	    	echo format_timeline_data(get_timeline_data($currency_2_id, $start_date, $end_date));
	    }
	?>
	;

	//Setup graph options

	var palette = new Rickshaw.Color.Palette();
	
	var graph = new Rickshaw.Graph( {
	    element: document.getElementById("chart"),
	    //width: 1130,
	    height: 300,
	    min: 'auto',
	    padding: { top: 0.2, bottom: 0.2 },
	    renderer: 'line',
	    stroke: true,
	    series: [ 
	    	{
	                color: palette.color(),
	                stroke: 'rgba(0,0,0,0.15)',
	                data: data1,
	                name: <?php if ($graph_type == 'calculation' ) { echo '"'. get_currency_name($currency_1_id) .' / '. get_currency_name($currency_2_id) .'"'; } else { echo '"'. get_currency_name($currency_1_id) .'"'; } ?>
	        },
	        {
	                color: palette.color(),
	                stroke: 'rgba(0,0,0,0.15)',
	                data: data2,
	                name: <?php if ($graph_type == 'calculation' ) { echo '"'. get_currency_name(get_wocu_id()) .' / '. get_currency_name($currency_2_id) .'"'; } else { echo '"'. get_currency_name($currency_2_id) .'"'; } ?>
	        }
	        ]
	} );

	// var time = new Rickshaw.Fixtures.Time();
	// var year = time.unit('year');

	var xAxis = new Rickshaw.Graph.Axis.Time( {
		graph: graph,
	} );

	var yAxis = new Rickshaw.Graph.Axis.Y( {
		graph: graph,
		tickFormat: Rickshaw.Fixtures.Number.formatKMBT
	} );

	graph.render();

	var legend = document.querySelector('#legend');

	var Hover = Rickshaw.Class.create(Rickshaw.Graph.HoverDetail, {

		render: function(args) {

			legend.innerHTML = args.formattedXValue;

			args.detail.sort(function(a, b) { return a.order - b.order }).forEach( function(d) {

				var line = document.createElement('div');
				line.className = 'line';

				var swatch = document.createElement('div');
				swatch.className = 'swatch';
				swatch.style.backgroundColor = d.series.color;

				var label = document.createElement('div');
				label.className = 'label';
				label.innerHTML = d.name + ": " + d.formattedYValue;

				line.appendChild(swatch);
				line.appendChild(label);

				legend.appendChild(line);

				var dot = document.createElement('div');
				dot.className = 'dot';
				dot.style.top = graph.y(d.value.y0 + d.value.y) + 'px';
				dot.style.borderColor = d.series.color;

				this.element.appendChild(dot);

				dot.className = 'dot active';

				this.show();

			}, this );
	        }
	});

	var hover = new Hover( { graph: graph } ); 

</script>

