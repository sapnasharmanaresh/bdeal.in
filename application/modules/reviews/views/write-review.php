<div class='reviewForm'>
<table>
    <tr>
        <td><input type="text" placeholder="title" id="reviewTitle"></td>
    </tr>
    <tr>
         <td> <textarea id="newReview" name="newReview" rows='5' cols='70'></textarea>
         </td>
    </tr>
    <tr>
        <td>    <div id="rate">
            <?php Modules::run('rating', 'set_rating'); ?>
        </div>

    </td>
    </tr>
    <tr>
    <td><input type="submit" value="Post" class='btn' name="post" onclick="postReview(<?php echo $this->prod_id ?>);return false;">
         </td>
    </tr>
    
</table>

</div>
   
