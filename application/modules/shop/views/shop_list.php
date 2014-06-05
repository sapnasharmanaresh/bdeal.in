<?php
foreach($this->shops as $k=>$shop){
    ?>
<tr>
    <td>
        <input type='checkbox'>
    </td>
<td><?php echo $shop['shop_name'] ?></td>
<tr>
<?php
} 
?>

