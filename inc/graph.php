<div class="well">
	<div class="row-fluid">
		<div id="chart_container">
			<div id="graph"></div>
			<div id="legend_container">
			<div id="smoother" title="Smoothing"></div>
			<div id="legend"></div>
			</div>
		</div>
	</div>
</div>
<script>
	// Get currency 1 data
	var data1 = 
	<?php
	    // Call for data
	    echo format_timeline_data(get_timeline_data($currency_1_id, $start_date)); 
	?>
	;

	// Get currency 2 data
	var data2 = 
	<?php
	    // Call for data
	    echo format_timeline_data(get_timeline_data($currency_2_id, $start_date));
	?>
	;

	//Setup graph options

	var palette = new Rickshaw.Color.Palette();
	
	var graph = new Rickshaw.Graph( {
	    element: document.getElementById("graph"),
	    width: 1130,
	    height: 300,
	    renderer: 'line',
	    stroke: true,
	    series: [ 
	    	{
	                color: palette.color(),
	                stroke: 'rgba(0,0,0,0.15)',
	                data: data1,
	                name: <?php echo '"'. get_currency_name($currency_1_id) .'"'; ?>
	        },
	        {
	                color: palette.color(),
	                stroke: 'rgba(0,0,0,0.15)',
	                data: data2,
	                name: <?php echo '"'. get_currency_name($currency_2_id) .'"'; ?>
	        }
	        ]
	} );

	graph.render();

	// var hoverDetail = new Rickshaw.Graph.HoverDetail( {
	// 	graph: graph
	// } );

	var hoverDetail = new Rickshaw.Graph.HoverDetail( {
		graph: graph,
		formatter: function(series, x, y) {
			var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
			var content = swatch + series.name + ": " + y;
			return content;
		}
	} );


	var legend = new Rickshaw.Graph.Legend( {
		graph: graph,
		element: document.getElementById('legend')

	} );

	var shelving = new Rickshaw.Graph.Behavior.Series.Toggle( {
		graph: graph,
		legend: legend
	} );

	var ticksTreatment = 'glow';

	var xAxes = new Rickshaw.Graph.Axis.Time( {
		graph: graph
	} );
	xAxes.render();

	var yAxis = new Rickshaw.Graph.Axis.Y( {
	    graph: graph,
	    tickFormat: Rickshaw.Fixtures.Number.formatKMBT,
	    ticksTreatment: ticksTreatment
	} );

	yAxis.render();

</script>

