
<nav class='nav2'>
    <ul class="nav">
        <li><a id="request" href="<?php echo BASEURL ?>template/owner">Home</a></li>

        <li><a href="">Manage</a>
            <ul>
           
                <?php
                /**
                 * In advertisement request , shops can show advertisement on each other's portals
                 */
                ?>
                <li><a id="request" href="<?php echo BASEURL ?>owner/advertisement">Advertisement Request</a></li>
                <li><a id="request" href="<?php echo BASEURL ?>owner/coupon">Coupon</a></li>
                <li><a href ="<?php echo BASEURL ?>owner/shopNav">Shop navigation</a></li>
                <li><a href="<?php echo BASEURL; ?>owner/email">Email</a></li>
                <li><a href="<?php echo BASEURL; ?>owner/empSalary">Employee Salaries</a></li>
               
                <li><a href="#">Products</a>
                    <ul>
                        <li><a href='<?php echo BASEURL ?>owner/stock'>Stock</a></li>
                        <li><a href="<?php echo BASEURL ?>owner/product_list">Listing</a></li>
                          <li><a href="<?php echo BASEURL ?>owner/newProduct">Add new</a></li>
                          
                    </ul>
                </li>
            </ul>    
        </li>
        <li>Generate
            <ul>
                <li><a href=''>Customer Invoice</a></li>
            </ul>
        </li>
        
        <li><a href="">Users</a>
            <ul>
                <li><a href="<?php echo BASEURL ?>owner/employee">Departments</a>
                    <ul>
                        <li><a href='<?php echo BASEURL; ?>owner/department/accounts'>Accounts</a></li>
                        <li><a href='<?php echo BASEURL; ?>owner/department/sales'>Sales</a></li>
                        <li><a href='<?php echo BASEURL; ?>owner/department/purchase'>Purchase</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo BASEURL ?>owner/customer">Customer</li>

            </ul>    
        </li>
        
        <li><a href="<?php echo BASEURL ?>owner/orders">Orders</a></li><?php /* customer,payment status,fulfillment status,paid */ ?>
        <li><a href="<?php echo BASEURL ?>owner/analysis">Analysis</a>
            <?php /**
             *  Purchase
             * Sales
             * 
             * Revenue
             * Overall mall performance
             * Other analysis
             */
            ?>
        </li>
        <li><a href="">Interaction</a>
            <ul>
                <li><a href="<?php echo BASEURL ?>owner/complaints">Complaints</a></li>
                <li><a href="<?php echo BASEURL ?>owner/feedback">Feedback</a></li>
            </ul>    
        </li>
        <li>Settings
            <ul>
                <li><a href="<?php echo BASEURL ?>owner/settings/general">General</a></li>
                <li><a href="<?php echo BASEURL ?>owner/settings/shipping">Shipping</a></li>
                <li><a href="<?php echo BASEURL ?>owner/settings/account">Account</a></li>
                <li><a href="<?php echo BASEURL ?>owner/settings/notifications">Notifications</a></li>
                <li><a href="<?php echo BASEURL ?>owner/settings/checkout">Checkout</a></li>
                <li><a href="<?php echo BASEURL ?>owner/settings/taxes">Taxes</a></li>
                <?php
                /*
                 * Look and feel of site changes
                */
                    ?>
            </ul>
        </li>


    </ul>
</nav>
