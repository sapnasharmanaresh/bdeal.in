<?php
/**
 * Accounts department will manage only financial status of whole mall
 * and can interact with anybody
 * 
 */

?>
<nav>
    <ul class="nav">
        <li><a id="request" href="">Home</a></li>


        <li><a href="">Detail</a>
            <ul>

                <li>Shops</li><?php
                /*
                 * how many shops
                 * performace
                 * decide rewards for shops and tl admin to clear dat
                 */
                ?>
                <?php
                /*
                 * 
                 * complete info abt shop , everything (product listing,items of each category)
                 */
                ?>
                <li>Salary</li>
                <?php
                /**
                 * Accounts dept of admin can see all transaction records of admin only
                 * but only total amount in shop account 
                 * only to decide admin portion in their total profit
                 * 
                 */
                ?>

                <li><a id="request" href="">Admin account</a></li>
                <li><a id="request" href=''>Shops account</a></li><?php
                    /*
                     * deal wd each shop with der profit
                     * complete transaction detail
                     */
                    ?>
                <li>Email</li>
            </ul>    
        </li>



        <li>Analysis</li>
           

        <li>Transactions</li>
        <li>Interaction
            <?php
            /**
             * interaction page will give options to choose from 
             * admin
             * shop account dept
             * other admin accounts department
             */
            ?>
        </li>

        <li>Settings</li>

    </ul>
</nav>

<?php
/* send mail to all owners abt der monthly rent nd other scenarios
 * 
 */
?>