<script>
    graph(<?php echo $this->myData ?>, 'No of users', 'Number', 'Time', 'userGraph');
    graph(<?php echo $this->visitorsData ?>, 'Visitors', 'Number', 'Time', 'visitors');
</script>
<div class='span_1_of_6_omega current-Adver'>
    <?php
Modules::run('advertisement','current_rates');

?>
</div>


<?php
/**
 * can give discounts at some items and show those items on front page
 * 
 */
?>

<div id="userGraph" class="graph color1 left"></div>
<div id="visitors" class="graph color2 left"></div>
