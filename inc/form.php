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
                    <select name="period" id="period" class="span8">
                        <option value="2000-01-01" <?php if ($start_date == '2000-01-01') { echo 'selected="selected"'; } ?>>2000-01-01</option>
                        <option value="2010-07-01" <?php if ($start_date == '2010-07-01') { echo 'selected="selected"'; } ?>>2010-07-01</option>
                    </select>
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
