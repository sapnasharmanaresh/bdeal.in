<?php
if (isset($_GET['id'])) {
    $detail = $_GET['id'];
    echo "Submenus are";
    echo $i . " : <input type='text' value=" . $value[''] . " name='position" . $i . "'> <a href=?id=" . $i . ">Show detail</a>";
}
?>
Your current positioning is 
Position
<form name="shopNav" action ="">

    <?php
    echo $i . " : <input type='text' value=" . $value[''] . " name='position" . $i . "'> <a href=?id=" . $i . ">Show detail</a>";
    ?>
    1 : <input type='text' value='<?php ?>' name='position1'> <a href="">Show detail</a>
    2 : <input type='text' value='' name='position2'>
    3 : <input type='text' value='' name='position3'>
    4 : <input type='text' value='' name='position4'>
    5 : <input type='text' value='' name='position5'>
    6 : <input type='text' value='' name='position6'>
    7 : <input type='text' value='' name='position7'>

    <input type='submit' name='commit' value='Commit'>
</form>