<nav>
    <ul class="nav">
        <li><a id="request" href="">Home</a></li>
        

        <li><a href="">Detail</a>
            <ul>
              <?php
                /*
                 * 
                 * performace
                 * decide rewards for customers and tl admin to clear dat
                 * 
                 * 
                 * 
                 */
                ?>
                <li><a id="request" href="">Customer</a></li>
                <li><a id="request" href=''>Shop Wallet</a></li><?php
                /*
                 * deal wd each shop with der profit
                 * complete transaction detail
                 */
                ?>
                <li>Email</li>
            </ul>    
        </li>
        <?php
        /**
         * vendors are considered as static end but they must be issued invoices of money
         */
        ?>
        <li>Generate invoices to vendors</li>

        
        <?php
        /*
         * 
         * complete info abt shop , everything (product listing,items of each category)
         */
        ?>
        <li>Orders<ul>
                <li><a href='<?php echo BASEURL; ?>account/currentOrder'>Current</a></li>
                <li><a href='<?php echo BASEURL; ?>account/pastOrder'>Past</a></li>
            </ul> 
            
        <li><a href='<?php echo BASEURL; ?>account/transactions'>Transactions</a></li>
        <li><a href='<?php echo BASEURL; ?>account/interaction'>Interaction</li>
            
        <li>Settings</li>

    </ul>
</nav>

<?php
/*send mail to all owners abt der monthly rent nd other scenarios
 * 
 */
?>