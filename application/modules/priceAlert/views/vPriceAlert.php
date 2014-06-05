<form name="priceAlert" action="" method="post">
    <input type="text" name="lvalue" placeholder="Lower Limit">
    <input type="text" name="uvalue" placeholder="Upper Limit">
    <input type="submit" name="setalert" id="setAlert" value="Set Alert">
</form>
<?php
if (isset($_POST['setalert'])) {
    if (!isset($_SESSION['loggedIn'])) {
        
            echo "<script>alert('Kindly login to set price alert);</script>";
        }
    else {
        if($_SESSION['loggedIn'] == true)
        echo 'csdds';
        echo "<script>window.location.pathname=" . BASEURL . "pricealert/setPriceAlert</script>";
    }
}
?>