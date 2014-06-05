
<?php
include'form.php';
if (isset($this->res)) {
    if (!empty($this->res)) {
        foreach ($this->res as $key => $value) {
            ?>
            <div id="request-info">


                <p>Request id = <?php echo 'ore_' . $value['id']; ?></p>
                Currently , Only cash method is available .Kindly give your amount in cash.<br/>
                Other payment methods will be updated soon.
                <?php
            }
            ?>
        </div>

        <?php
    } else {

        echo "No such email in records<br>Try again!!";
    }
}
?>