Give rating to this product
Select
<form name="rate-count" action="" method="post">
<select name="rate">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
</select>
    <input type="submit" name="set" value="Save">
</form>
<!--    <?PHP
/* Complete Star Rating Script
  Created By Jeff Baker on March 22, 2013
  www.seabreezecomputers.com/rating
  ver 1.4 - April 24, 2014
 */
//@session_start();

// Enter your mysql database username, password and database name below.  
// Usually leave server as localhost
//$db_username = "your_mysql_username";
//$db_pw = "your_pw";
//$server = "localhost";
//$database = "your_mysql_database";
//
//@include_once('settings.php');
//
//$require_login = 1; // 1 = yes; 0 = no (Not recommended. User's IP Address is used as user_id
//$your_login_page = "login.php"; /* Put the link to your login page here */
//$star_image_width = 1; // 1em; Could change to 16 for image of a star that is 16 pixels wide
//$star_width_type = 'em'; // Change to 'px' for pixels if using an image instead of HTML entity
//$yellow_star = '&#9733;'; // HTML entity of a star
////$yellow_star = "<img src='yellowstar.gif'>"; // If you want to use an image then uncomment this line
//$grey_star = '&#9733;'; // HTML entity of a star used for blank stars in ratings
////$grey_star = "<img src='greystar.gif'>"; // If you want to use an image then uncomment this line
//$user_star = '&#9733;'; // HTML entity of a star used for the users personal rating
////$user_star = "<img src='redstar.gif'>"; // If you want to use an image then uncomment this line
//$blank_star = '&#9734;'; // HTML entity of a star outline used for a users personal rating before rating
////$blank_star = "<img src='blankstar.gif'>"; // If you want to use an image then uncomment this line
//
//$yellow = "#F99B00"; // Color used for HTML star entity
//$grey = "#999999"; // Color used for remainder of stars not in the rating value
//$red = "#FF5555"; // Color used for the stars of the users personal rating
//// connect to mysql
//$link = mysql_connect($server, $db_username, $db_pw)
//        or die("Couldn't connect to MySQL" . mysql_error());
//
//// connect to database
//mysql_select_db($database, $link)
//        or die("Select DB Error: " . mysql_error());
//
///* 	$id is an id number that you have given this product or webpage to differentiate it from
//  other products or webpages.
//  In this instance $id is derived from an id variable in the URL string.
//  For example: http://www.website.com/thispage.php?id=5
//  You may replace $_REQUEST['id'] with a unique number for this page if you like.
//  In the star_rating table $id is stored in the 'page' field.
// */
//$id = $_REQUEST['id'];
//
///* 	$name is the name of the product being reviewed and rated.
//  In this instance $name is derived from a mysql row called $r and a database field 'name'
//  You would set this up on the webpage that calls this script.  Something like:
//  $query = "SELECT name FROM producs WHERE id = '$id' LIMIT 1";
//  $result = mysql_query($query) or die($query." : ".mysql_error());
//  if (mysql_num_rows($result))
//  {
//  $r = mysql_fetch_assoc($result);
//  }
//  Or you can just make up a name here if you arn't calling this script from multiple pages:
//  $name = "Green Widget";
// */
//$name = $r['name']; // Name of product. Needed for schema.org microdata and for rich snippets to appear in search engines
//
//
///* $user_id is how this script allows users to submit ratings.  They must be logged
//  in and a $_SESSION['user_id'] must be set.  Instead, you may be using $_SESSION['username']
//  on your server.  In that case you will need to change the star_rating table
//  to have something like "user_id VARCHAR(50)," in place of "user_id INT," and you
//  will need to replace all references of $_SESSION['user_id'] in this script to $_SESSION['username']
// */
//if ($require_login) // 4/24/2014 ver. 1.4 (Allow script to be used without login.php)
//    $user_id = mysql_real_escape_string(strip_tags(substr($_SESSION['user_id'], 0, 50)));
//else {
//    if (isset($_COOKIE['user_id'])) // If they have rated before and have a cookie set
//        $user_id = $_SESSION['user_id'] = mysql_real_escape_string(strip_tags(substr($_COOKIE['user_id'], 0, 50)));
//    else { // new user using ip address as user_id
//        $user_id = $_SESSION['user_id'] = ip2long(mysql_real_escape_string(strip_tags(substr($_SERVER['REMOTE_ADDR'], 0, 50))));
//        $expire_time = time() + 60 * 60 * 24 * 365 * 10; // 10 years
//        @setcookie("user_id", $user_id, $expire_time);
//    }
//}
///* $_SESSION['refer'] is set so that if a user is not logged in then your login script
//  can check to see if $_SESSION['refer'] is set so that the user is redirected back to
//  this page so that they can submit a rating.  It can be checked in your login.php file
//  like this:
//  if (isset($_SESSION['refer']))
//  $location = $_SESSION['refer'];
// */
//if (!isset($_REQUEST['rating'])) // Only set refer if script is not being called by ajax - 7/29/2013
//    $_SESSION['refer'] = $_SERVER['REQUEST_URI'];
//
//$avg_stars = $total_votes = 0;
//
//// Create star_rating table if it does not exist
//$result = mysql_query("CREATE TABLE IF NOT EXISTS star_rating
//	( id INT NOT NULL AUTO_INCREMENT, 
//	PRIMARY KEY(id), 
//	page INT,
//	INDEX page(page),
//	user_id INT unsigned,
//	INDEX user_id(user_id),
//	stars TINYINT NOT NULL,				
//	sent_date DATETIME)")
//        or die("Couldn't create table star_rating: " . mysql_error());
//
//// Create star_rating_averages table if it does not exist
//$result = mysql_query("CREATE TABLE IF NOT EXISTS star_rating_averages
//	( id INT NOT NULL AUTO_INCREMENT, 
//	PRIMARY KEY(id), 
//	page INT,
//	INDEX page(page),
//	avg_stars FLOAT NOT NULL,	
//	total_votes INT)")
//        or die("Couldn't create table star_rating_averages: " . mysql_error());
//
//$id = mysql_real_escape_string(strip_tags(substr($id, 0, 30)));
//
//// Fill in some test values (Uncomment this section to fill in test values in mysql table)
///* 	if (isset($_REQUEST['id']))
//  {
//  $query = "INSERT INTO star_rating_averages (page, avg_stars, total_votes)
//  VALUES ('$id', 0, 0)";
//  $result = mysql_query($query) or die($query." : ".mysql_error());
//  for ($i = 1; $i <= 5; $i++)
//  {
//  $query = "INSERT INTO star_rating (page, user_id, stars, sent_date)
//  VALUES ('$id', '$user_id', '$i', NOW())";
//  $result = mysql_query($query) or die($query." : ".mysql_error());
//  }
//  $query = "UPDATE star_rating_averages
//  SET avg_stars = (SELECT ROUND(AVG(stars),1)
//  FROM star_rating WHERE page='$id'),
//  total_votes = (SELECT COUNT(*)
//  FROM star_rating WHERE page='$id')
//  WHERE page = '$id' LIMIT 1";
//  $result = mysql_query($query) or die($query." : ".mysql_error());
//  }
// */
//
//if (isset($_REQUEST['id']))
//    if (isset($_REQUEST['rating'])) // The user has selected a star rating
//        if (isset($_SESSION['user_id'])) { // But they must be logged in to submit their rating
//            /* If they have submitted a value already then just update their rating.
//              Having the date field in star_rating table makes it always update even on a duplicate rating
//              that way we don't end up with an extra vote with an update and an insert.
//             */
//            $rating = mysql_real_escape_string(strip_tags(substr($_REQUEST['rating'], 0, 1)));
//            if ($rating > 5)
//                $rating = 5; // Make sure star rating is maximum of 5 and ...
//            else if ($rating < 1)
//                $rating = 1; // ... minimum of 1
//
//                
//// First see if the user has submitted a rating for this product in the past
//            $query = "SELECT id, stars FROM star_rating
//					WHERE page = '$id' AND user_id = '$user_id' LIMIT 1";
//            $result = mysql_query($query) or die($query . " : " . mysql_error());
//            if (mysql_num_rows($result)) {
//                $your_row = mysql_fetch_array($result);
//                $old_rating = $your_row['stars'];
//                $your_row = $your_row['id'];
//                // Only update rating if the new rating is different from the old rating
//                if ($old_rating != $rating) {
//                    $query = "UPDATE star_rating SET stars='$rating', sent_date = NOW()
//					WHERE id='$your_row' LIMIT 1";
//                    $result = mysql_query($query) or die($query . " : " . mysql_error());
//                    // Calculate the difference between users $old_rating and users new $rating
//                    $diff = $rating - $old_rating;
//                    // Update star_rating_averages table
//                    $query = "UPDATE star_rating_averages 
//						SET avg_stars = ROUND((avg_stars * total_votes + $diff) / total_votes, 2)
//						WHERE page = '$id' LIMIT 1";
//                    $result = mysql_query($query) or die($query . " : " . mysql_error());
//                }
//            } else { // User is rating this product for the first time
//                $query = "INSERT INTO star_rating (page, user_id, stars, sent_date)
//						VALUES ('$id', '$user_id', '$rating', NOW())";
//                $result = mysql_query($query) or die($query . " : " . mysql_error());
//                // Update star_rating_averages table
//                $query = "UPDATE star_rating_averages 
//						SET avg_stars = ROUND((avg_stars * total_votes + $rating) / (total_votes+1), 2),
//						total_votes = total_votes + 1
//						WHERE page = '$id' LIMIT 1";
//                $result = mysql_query($query) or die($query . " : " . mysql_error());
//                if (mysql_affected_rows() == 0) { // Or add to table if page of $id does not exist
//                    $query = "INSERT INTO star_rating_averages (page, avg_stars, total_votes)
//						VALUES ('$id', '$rating', '1')";
//                    $result = mysql_query($query) or die($query . " : " . mysql_error());
//                }
//            }
//        }
//
//if ($id >= 1) {
//
//    /* Get average star rating and amount of users voting
//      ROUND is a mysql command that rounds a number. In this instance to 1 decimal point.
//      So 3.4333 will just be 3.4
//      AVG gets the averager of all 'stars' fields
//      The 'page' field is an id number made up by you as a reference for the current webpage
//     */
//    // This is the old database intensive way (not being run)
//    $query = "SELECT ROUND(AVG(stars),1) AS avg_stars, COUNT(*) AS total_votes 
//				FROM star_rating
//				WHERE page = '$id'";
//    // The new way grabs the votes from the star_rating_averages table
//    $query = "SELECT ROUND(avg_stars,1) AS avg_stars, total_votes
//				FROM star_rating_averages
//				WHERE page = '$id'";
//    $result = mysql_query($query) or die($query . " : " . mysql_error());
//    if (mysql_num_rows($result)) {
//        $row = mysql_fetch_array($result);
//        $total_votes = $row['total_votes'];
//        $avg_stars = $row['avg_stars'];
//        if (is_null($avg_stars))
//            $avg_stars = 0;
//
//        /* Now that we have the average stars we want to have ratings detail and
//          get the total votes for each star rating and the percentage of the vote
//          for each star rating
//         */
//        $ratings_detail = '<table>';
//        $query = "SELECT stars, COUNT(*) AS votes 
//					FROM star_rating
//					WHERE page = '$id' GROUP BY stars ORDER BY stars DESC";
//        $result = mysql_query($query) or die($query . " : " . mysql_error());
//        while ($row = mysql_fetch_assoc($result)) {
//            $percentage = round($row['votes'] / $total_votes * 100);
//            $ratings_detail .= "<tr><td>" . $row['stars'] . " stars </td>" .
//                    "<td><hr align='left' noshade size='4' width='" . ($percentage * 2) . "'></td>" .
//                    "<td>" . $row['votes'] . " votes</td></tr>";
//        }
//        $ratings_detail .= '</table>';
//    } else { // No votes for this page yet
//        $total_votes = 0;
//        $avg_stars = 0;
//    }
//} else {
//    echo "No item id is specified so star ratings can't be done.";
//    //exit;
//}
//
//$error = "";
//$message = "";
//
///* Setup the stars by using images or HTML Entities Star: &#9733; 
//  We will have one absolute positioned span inside of and on top of one relative span
// */
//// Calculate the width of the yellow stars
//$avg_stars_width = round($star_image_width * $avg_stars, 1);
//// Put 5 grey stars in relative span
//$stars_display .= "<span style='position: relative; display:inline-block; color: $grey; '>" .
//        $grey_star . $grey_star . $grey_star . $grey_star . $grey_star;
//// Overlay 5 yellow stars on top of the grey stars
//$stars_display .= "<span style='position: absolute; top: 0; left: 0; color: $yellow; overflow:hidden; width: " .
//        $avg_stars_width . $star_width_type . " '>" .
//        $yellow_star . $yellow_star . $yellow_star . $yellow_star . $yellow_star . "</span>";
//// Close relative span
//$stars_display .= "</span>";
//
///* 	Setting the schema.org microdata for Ratings Rich Snippets in a Google Search
//
//  http://schema.org/docs/full.html has the full type heirarchy, but the only types
//  that seem to display stars in the Google Structured Data Testing Tool is
//  Product and Restaurant
//
//  Could also add content="4" such as <span itemprop="ratingValue" content="4">****</span>
// */
//$schema = '<span itemscope itemtype="http://schema.org/Product">' .
//        '<span itemprop="name">' . addslashes($name) . '</span>' .
//        ' <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">' .
//        ' <span itemprop="ratingValue">' . $avg_stars . '</span>' .
//        ' out of <span itemprop="bestRating">5</span> stars' .
//        ' based on <span itemprop="ratingCount">' . $total_votes . '</span> ratings.' .
//        '</span> ' .
//        '</span>';
//
///* See if current user has already submitted a rating for this page */
//if (isset($_SESSION['user_id'])) {
//    $query = "SELECT stars, sent_date FROM star_rating
//					WHERE page = '$id' AND user_id = '$user_id' LIMIT 1";
//    $result = mysql_query($query) or die($query . " : " . mysql_error());
//    if (mysql_num_rows($result)) {
//        $your_row = mysql_fetch_array($result);
//        $your_rating = $your_row['stars'];
//        $your_date = date('F j, Y', strtotime($your_row['sent_date']));
//    }
//
//    /* Create a star ratings span for the current user to be able to submit a rating */
//    $your_rating_display .= "<br>Your Rating: <span style='cursor:pointer; position: relative; display:inline-block; color: $grey; ' >";
//    for ($i = 1; $i <= 5; $i++) { // Five empty stars with mouseover events (or some yellow stars with your previous rating)
//        $stars_width = round($star_image_width * $i, 1) . $star_width_type;
//        if (isset($your_rating) && $i <= $your_rating) // Your previous rating stars
//            $your_rating_display .= "<span style='color: $red' onmouseover='if (!("ontouchstart" in document.documentElement)) document.getElementById("your_stars").style.width = ".
//        ""$stars_width"' onclick='send_rating($i)'>" .
//                "$user_star</span>";
//        else // empty stars				
//        $your_rating_display .= "<span onmouseover='if (!("ontouchstart" in document.documentElement)) document.getElementById("your_stars").style.width = ".
//        ""$stars_width"' onclick='send_rating($i)'>" .
//                "$blank_star</span>";
//    }
//    // Overlay 5 yellow stars on top of the grey stars
//    $your_rating_display .= "<span id='your_stars' style='position: absolute; top: 0; left: 0; color: $yellow; overflow:hidden;".
//    " width: 0; ' onmouseout='document.getElementById("your_stars").style.width = "0"'>";
//    for ($i = 1; $i <= 5; $i++) { // Five yellow stars with mouseover events
//        $stars_width = round($star_image_width * $i, 1) . $star_width_type;
//        $your_rating_display .= "<span onmouseover='if (!("ontouchstart" in document.documentElement)) document.getElementById("your_stars").style.width = ".
//        ""$stars_width"' onclick='send_rating($i)'>" .
//                "$yellow_star</span>";
//    }
//    $your_rating_display .= "</span></span>";
//    if (isset($your_rating))
//        $your_rating_display .= " $your_rating stars on $your_date"; // Display date next to your rating
//} else
//    $your_rating_display = "<a href='$your_login_page'>Login</a> to submit your rating<br>";
//
//if ($error != '') { // if there is an error than print it.
//    addslashes($error);
//    echo 'document.write("<P>Error: ' . $error . '");' . chr(13);
//}
//
///* If the user is submitting a rating through ajax 
//  then we are sending output through ajax so don't surround with div
//  so that javascript ratings_get_ajax() can put the HTML into the 'star_rating_div' div
// */
//if (isset($_REQUEST['rating'])) {
//    echo $stars_display . $schema . $ratings_detail . $your_rating_display;
//    exit;
//} else { // This document is not being called through ajax.  Output to screen:
//    // schema microdata can't be read through javasctipt so we create the div in html not document.write
//    $message = "<div id='star_rating_div'>" . $stars_display . $schema . $ratings_detail . $your_rating_display . "</div>";
//    echo $message;
//}
?>
<script type="text/javascript">
    var page_id = '<?PHP echo $id; ?>';
    var req = false;


    function ratings_send_ajax(params)
    {
        //loadXMLDoc
        req = false;

        // branch for native XMLHttpRequest object
        if (window.XMLHttpRequest && !(window.ActiveXObject))
        {
            try
            {
                req = new XMLHttpRequest();
            }
            catch (e)
            {
                req = false;
            }
            // branch for IE/Windows ActiveX version
        }
        else if (window.ActiveXObject)
        {
            try
            {
                req = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                try
                {
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e)
                {
                    req = false;
                }
            }
        }
        if (req)
        {
            req.onreadystatechange = ratings_get_ajax;
            req.open("POST", "ratings.php", true);
            //Send the proper header information along with the request
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send(params);
        }
    } // end function loadXMLDoc


    function ratings_get_ajax()
    {
        // only if req shows "loaded"
        if (req.readyState == 4)
        {
            // only if "OK"
            if (req.status == 200)
            {
                if (req.responseText)
                {
                    document.getElementById('star_rating_div').innerHTML = req.responseText;
                }
            }
            else
            {
                alert("There was a problem retrieving the XML data:n" +
                        req.status);
            }
        }
    } // end function processReqChange()

    function send_rating(rating)
    {
        params = "id=" + page_id + "&rating=" + rating;
        ratings_send_ajax(params);

    } // end function send_rating(rating)
</script>-->