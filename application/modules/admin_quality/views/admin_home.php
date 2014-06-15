<?php
/**
 * admin_quality department
 */

?>

NOTIFICAIONS
<?php
/**
 * tells abt newly arrived items
 */



?>
<script>
    graph(<?php echo $this->myData ?>, 'No of users', 'Number', 'Time', 'userGraph');
    graph(<?php echo $this->visitorsData ?>, 'Visitors', 'Number', 'Time', 'visitors');
</script>
<section class="admin_section3">

<div id="userGraph" class="graph-lg color1 left"></div>
<div id="visitors" class="graph-lg color2 left"></div>
</section>