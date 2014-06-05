<input type="text" placeholder="title" id="reviewTitle">
    <textarea id="newReview" name="newReview"></textarea>
    <input type="submit" value="Post" name="post" onclick="postReview(<?php echo $this->prod_id ?>);return false;">
