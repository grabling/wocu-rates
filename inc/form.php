<?php
    $currency_list_one = get_all_currency_names();
    $currency_list_two = get_all_currency_names();

?>
<div class="well">
    <div class="row-fluid">
        <form action="index.php" method="GET">
            <div class="span12">
                <div class="span2">
                    <label>
                        <h6>Currency 1</h6>
                    </label>
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
                    <label>
                        <h6>Currency 2</h6>
                    </label>
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
                    <label>
                        <h6>Start Date</h6>
                    </label>
                    <input type="text" class="span8" value="<?php if (isset($start_date)) { echo $start_date; } else { echo get_min_date(); } ?>" id="startdate" name="startdate">
                </div>
                <div class="span2">
                    <label>
                        <h6>End Date</h6>
                    </label>
                    <input type="text" class="span8" value="<?php if (isset($end_date)) { echo $end_date; } else { echo get_max_date(); } ?>"  id="enddate" name="enddate">
                </div>
                <div class="span2">
                    <label>
                        <h6>Type</h6>
                    </label>
                    <select name="type" id="type" class="span8">
                        <option value="fxrates" <?php if ($graph_type == 'fxrates') { echo 'selected="selected"'; } ?>>FX Rates</option>
                        <option value="calculation" <?php if ($graph_type == 'calculation') { echo 'selected="selected"'; } ?>>Calculation</option>
                    </select>
                </div>
                <div class="span2">
                    <label>
                        <h6>View data</h6>
                    </label>
                    <button type="submit" class="btn">Submit</button>
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
