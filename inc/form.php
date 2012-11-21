<?php
    $currency_list_one = get_all_currency_names();
    $currency_list_two = get_all_currency_names();

?>
<div class="well">
    <div class="row-fluid">
        <form action="index.php" method="GET">
            <div class="span12">
                <div class="span2">
                    <label>Currency 1</label>
                    <select name="c1" id="c1" class="span8">
                        <?php
                        while($row = mysql_fetch_array($currency_list_one)){
                            
                            echo '<option value="'.$row['id'].'"';
                            if ($currency_1_id == $row['id']) { 
                                echo 'selected="selected"';
                            }
                            echo '>'.strtoupper($row['name']).'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="span2">
                    <label>Currency 2</label>
                    <select name="c2" id="c2" class="span8">
                        <?php
                        while($row = mysql_fetch_array($currency_list_two)){
                            
                            echo '<option value="'.$row['id'].'"';
                            if ($currency_2_id == $row['id']) { 
                                echo 'selected="selected"';
                            }
                            echo '>'.strtoupper($row['name']).'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="span2">
                    <label>Start Date</label>
                    <input type="text" class="span8" value="<?php if (isset($start_date)) { echo $start_date; } else { echo get_min_date(); } ?>" id="startdate" name="startdate">
                </div>
                <div class="span2">
                    <label>End Date</label>
                    <input type="text" class="span8" value="<?php if (isset($end_date)) { echo $end_date; } else { echo get_max_date(); } ?>"  id="enddate" name="enddate">
                </div>
                <div class="span2">
                    <label>Type</label>
                    <select name="type" id="type" class="span8">
                        <option value="fxrates" <?php if ($graph_type == 'fxrates') { echo 'selected="selected"'; } ?>>FX Rates</option>
                        <option value="calculation" <?php if ($graph_type == 'calculation') { echo 'selected="selected"'; } ?>>Calculation</option>
                    </select>
                </div>
                <div class="span2">
                    <label>View Results</label>
                    <button type="submit" class="btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
	<div class="row-fluid">
			<div class="span12">
			</div>
    </div>
	<div class="row-fluid">
		<form action="index.php" method="GET">
			<div class="span12">
				<div class="span12">
					<?php echo 'Volatility since '.$start_date.': '; ?>
					<?php echo get_currency_name($currency_1_id) .'/'. get_currency_name($currency_2_id);?>
					<?php $result1 = calculation_stddev($currency_1_id, $currency_2_id, $start_date, $end_date); ?>
					<?php echo ' = '. $result1 .'%,' ; ?>
					<?php echo ' XCU/'. get_currency_name($currency_2_id); ?>
					<?php $result2 = calculation_stddev(get_wocu_id(), $currency_2_id, $start_date, $end_date); ?>
					<?php echo ' = '. $result2 .'%,' ; ?>
					<?php echo ' WOCU Reduction Factor = '; ?>
					<?php echo round(((($result1 - $result2) / $result1)*100),2) .'%' ;?>
				</div>
			</div>
		</form>
	</div>

</div>

<script>
    $(function(){
        $('#startdate').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#enddate').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
