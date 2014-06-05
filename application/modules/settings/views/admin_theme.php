<form name="setLogo" action="<?php echo BASEURL;?>admin/settings/theme" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th> Upload Logo</th>
        </tr>
        <tr>
            <td><input type="file" name="logo"></td>
        </tr>
        <tr>
            <td><input type="submit" name="changeLogo" value="Change" onclick="setLogo('default.jpg');return false;"></td>
        </tr>
    </table>
   



</form>

<?php
/**
 * change main slider images
 */
?>
<form name="setSider" action="" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th colspan="2">Slider Slides</th>
        </tr>
        <tr>
            <td>Slide 1 </td>
            <td><input type="file" name="slide1"></td>
        </tr>
        <tr>
            <td>Slide 2</td>
            <td><input type="file" name="slide2"></td>
        </tr>
        <tr>
            <td>Slide 3 </td>
            <td><input type="file" name="slide3"></td>
        </tr>
        <tr>
            <td>Slide 4 </td>
            <td><input type="file" name="slide4"></td>
        </tr>
        <tr>
            <td>Slide 5 </td>
            <td><input type="file" name="slide5"></td>
        </tr>
        <tr>
            <td>Slide 6 </td>
            <td><input type="file" name="slide6"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input  class="btn" type="submit" name="change" value="Commit"></td>
        </tr>
    </table>



</form>

<?php
/**
 * change banner images
 */
?>
<form name="setBanner" action="" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th colspan="2">Advertisement Banners</th>
        </tr>
        <tr>
            <td> banner 1 </td>
            <td><input type="file" name="banner1"></td>
        </tr>
        <tr>
            <td> banner 2 </td>
            <td><input type="file" name="banner2"></td>
        </tr>
        <tr>
            <td> banner 3 </td>
            <td><input type="file" name="banner3"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="btn" type="submit" name="change">
            </td>
        </tr>
    </table>
  

</form>

<?php
/*
 * one problem as in each section where products are shown 
 * only 25 products are shown in slider
 * I think I must pick up randomly as if I choose to pick up newly added products only
 * then if one shop has added all the products then all products of his shop will be shown 
 * 
 * then that's a problem so I can show all the recent events in one another block
 */
?>

<?php
/**
 * enable disable sections
 */
?>
