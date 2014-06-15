<table class='table'>
    <tr>
        <th>Sr no</th>
        <th>Emp_name</th>
        <th>Emp_department</th>
        <th>Emp_head</th>
        <th></th>

    </tr>
    <?php
    $i = 1;
    foreach ($this->result as $key => $value) {
        if ($value['role'] == 'admin_act' || $value['role'] == 'owner_act') {
            $role = 'Accounts';
        }
        if ($value['role'] == 'admin_sales' || $value['role'] == 'owner_sales') {
            $role = "Sales";
        }
        if ($value['role'] == 'admin_purchase' || $value['role'] == 'owner_purchase') {
            $role = 'Purchase';
        }
        if ($value['role'] == 'admin_quality') {
            $role = 'Quality';
        }
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $role; ?></td>
            <td><?php echo $value['head']; ?></td>
            <td><a href="<?php echo BASEURL.'admin/employee' ?>/<?php echo $value['id']; ?>">More Details</a></td>

        </tr>
    

    <?php
    $i++;
}
?>
</table>