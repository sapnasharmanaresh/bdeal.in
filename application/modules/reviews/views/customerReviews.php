<table>
    <tr>
        <td>Sr no</td>
        <td>Product name</td>
        <td>Your review</td>
        <td>Visit Product</td>
    </tr>
   
 <?php 
$num = 1;
 foreach($this->customerReviews as $key=>$value){ ?>
    <tr>
        <td><?php echo $num; ?></td>
        <td><?php echo $value[''] ?></td>
    </tr>
        <?php
    }
    ?>
</table>