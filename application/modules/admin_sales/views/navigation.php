<?php
/**
 * Sales department will check all the orders from the shops 
 * can get details of shop
 * salary status of emp
 * can interact with others 
 * 
 */

?>
<section class='section2'>
<aside class='nav2'>
    <ul class="nav">
        <li><a id="request" href="<?php echo BASEURL ?>admin_sales/dashboard">Home</a></li>


        <li><a href="">Detail</a>
            <ul>
				<li><a href='<?php echo BASEURL ?>admin_sales/currentOrders'>Current Orders</a></li>
				<li><a href='<?php echo BASEURL ?>admin_sales/pastOrders'>Past Orders</a></li>
                <li><a href='<?php echo BASEURL; ?>admin_sales/shopsDetail'>Shops</a></li>
                <li><a href='<?php echo BASEURL ?>admin_sales/salary'>Salary</a></li>
                <li><a href='<?php echo BASEURL ?>admin_sales/mail'>Email</a></li>
            </ul>    
        </li>



        <li>Analysis</li>
           

   
        <li><a href='<?php echo BASEURL?>admin_sales/interaction'>Interaction</a>
            <?php
            /**
             * interaction page will give options to choose from 
             * admin
             * shop sales dept
             * other admin sales department
             */
            ?>
        </li>

        <li>Settings</li>

    </ul>
</aside>

<?php
/* send mail to all owners abt der monthly rent nd other scenarios
 * 
 */
?>

</section>
