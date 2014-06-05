<section class="admin_section2">
<aside class="nav2">
    <ul class="nav">
        <li><a id="request" href="<?php echo BASEURL ?>admin/dashboard">Dashboard</a></li>
        
      <li><a href="#">Departments</a><ul>
                <li><a href="<?php echo BASEURL ?>admin/department/accounts">Accounts</a></li>
                <li><a href="<?php echo BASEURL ?>admin/department/sales">Sales</a></li>
                <li><a href="<?php echo BASEURL ?>admin/department/purchase">Purchase</a></li>
                <li><a href="<?php echo BASEURL ?>admin/department/quality">Quality</a></li>
            </ul>
        </li>
        <li><a href="">Manage</a>
            <ul>

                <li><a href="<?php echo BASEURL ?>admin/manageWelcomeNav">Welcome-nav</a></li>
                <li><a id="request" href="<?php echo BASEURL ?>admin/ownership">Ownership Request</a></li>
                <li><a id="adver-request" href="<?php echo BASEURL ?>admin/advertisement">Advertisement Request</a></li>
                <li><a id="mail" href="<?php echo BASEURL ?>admin/mail">Mail</a></li>
                <li><a href="">Employee Salaries</a>
                <?php
                /**
                 * admin can change the value of salaries acc to time
                 */
                ?>
                </li>
            </ul>    
        </li>
        <li><a href="">Users</a>
            <ul>
                <li><a href="<?php echo BASEURL; ?>admin/employee">Employee</a></li>
                <li><a href="<?php echo BASEURL;?>admin/customer">Customer</a></li>
                <li><a href="<?php echo BASEURL;?>admin/owner">Owner</a></li>
            </ul>    
        </li>
        <li><a href="<?php echo BASEURL;?>admin/analysis">Analysis</a>
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
                    <li><a href="<?php echo BASEURL;?>admin/complaints">Complaints</a></li>
                    <li><a href="<?php echo BASEURL;?>admin/feedback">Feedback</a></li>
                    <li><a href="<?php echo BASEURL;?>admin/interact">Chat</a></li>
                    
                </ul>    
                </li>
                <li>
                    Settings
                    <ul>
                        <li><a href="<?php echo BASEURL ?>admin/settings/theme">Theme</a></li></ul>
                </li>
                


    </ul>

</aside>
</section>
