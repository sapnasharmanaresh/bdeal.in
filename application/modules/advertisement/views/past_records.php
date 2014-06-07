
<table class='table'>
    <tr>
        <th colspan='7'>
            Past Records
        </th>
    </tr>
    <tr>
        <th>Sr no</th>
        <th>Request to </th>
        <th>Sent date</th>
        <th>Request Status</th>
        <th>Payment status</th>
        <th>Allotted dates: From</th>
        <th>Allotted dates: To</th>
    </tr>
    <?php

    foreach($this->res as $k=>$v){
       
        ?>
    <tr>
        <td><?php echo $v['request_id']; ?></td>
        <td><?php echo $v['request_to_user']; ?></td>
        <td><?php echo $v['dateOfRequest']; ?></td>
        <td><?php echo $v['status']; ?></td>
        <td><?php echo $v['allottedFromDate'] ?></td>
        <td><?php echo $v['allottedToDate'] ?></td>
    </tr>
    <?php

    }
    ?>
</table>
