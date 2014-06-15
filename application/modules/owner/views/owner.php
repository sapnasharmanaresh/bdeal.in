<script>
    graph(<?php echo $this->myData ?>, 'No of users', 'Number', 'Time', 'userGraph');
    graph(<?php echo $this->visitorsData ?>, 'Visitors', 'Number', 'Time', 'visitors');
</script>
<section class="admin_section3">

<div id="userGraph" class="graph-lg color1 left"></div>
<div id="visitors" class="graph-lg color2 left"></div>
</section>

<!--
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

<div id="userGraph" class="graph-lg color1 left"></div>
<div id="visitors" class="graph-lg color2 left"></div>