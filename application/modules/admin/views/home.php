<script>
    graph(<?php echo $this->myData ?>, 'No of users', 'Number', 'Time', 'userGraph');
    graph(<?php echo $this->visitorsData ?>, 'Visitors', 'Number', 'Time', 'visitors');
</script>
<section class="admin_section3">
<div id="notification-panel" class="right notify-panel color3">
    <?php Modules::run('notification', 'getNotification'); ?>
</div>

<div id="userGraph" class="graph color1 left"></div>
<div id="visitors" class="graph color2 left"></div>
</section>