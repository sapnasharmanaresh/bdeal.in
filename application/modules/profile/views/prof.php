<div class="wrapper">


<div class="aligncenter prof span_4_of_6">
    <?php
    foreach($this->res as $k=>$v){
        $name = $v['username'];
        $firstname = $v['firstname'];
        $lastname = $v['lastname'];
        $status = $v['status'];
        $email = $v['email'];
        $address = $v['address'];
        $contact = $v['contact'];
        $gender = $v['gender'];
        $dob = $v['dob'];
        $city = $v['city'];
        $pincode = $v['pincode'];
        $state = $v['state'];
        $country = $v['country'];
    }
    ?>
<table class="table">
    <tr>
        <td>You are </td>
        <td><?php echo $name  ?></td>
    </tr>
    <tr>
        <td>First name</td>
        <td><?php echo $firstname; ?></td>
    </tr>
    
    <tr>
        <td>Last Name</td>
        <td><?php echo $lastname ?></td>
    </tr>
     <tr>
        <td>Gender</td>
        <td><?php echo $gender ?></td>
    </tr>
     <tr>
        <td>Date of Birth</td>
        <td><?php echo $dob ?></td>
    </tr>
     <tr>
        <td>Email</td>
        <td><?php echo $email ?></td>
    </tr>
    
     <tr>
        <td>Contact</td>
        <td><?php echo $contact ?></td>
    </tr>
     <tr>
        <td>Country</td>
        <td><?php echo $country ?></td>
    </tr>
     <tr>
        <td>State</td>
        <td><?php echo $state ?></td>
    </tr>
     <tr>
        <td>City</td>
        <td><?php echo $city ?></td>
    </tr>
     <tr>
        <td>Pincode</td>
        <td><?php echo $pincode ?></td>
    </tr>
    
     <tr>
        <td>Address</td>
        <td><?php echo $address ?></td>
    </tr>
     <tr>
        <td>Account Status</td>
        <td><?php echo $status ?></td>
    </tr>
    
    <tr>
        <td></td>
    </tr>
</table>

<!--username
Address
contact
password
change password -->
<div id="updatePhoto" class="show_none">
    <form name="update-profile" action="<?php echo BASEURL ?>admin/profile" enctype="multipart/form-data" method='post'>
        <input type="file" name="file">
        <input type="submit" name="upload" value='Upload'>
    </form>
</div>

<div class='show_none' id='passwordPanel'>
    <form name='changePassword' action='<?php echo BASEURL ?>admin/profile' method='post'>
        <input type='password' name='prevPass' placeholder='Previous Password'>
        <input type='password' name='newPass' placeholder='New Password'>
        <input type='password' name='confirmPass' placeholder='Confirm Password'>
        <input type='submit' value='Commit Changes' name='changePassword'>
    </form>
</div>
</div>


<div class="alignright right span_1_of_6_omega">
    <img src="<?php echo BASEURL.PROFILE_IMAGE; ?><?php echo $this->res[0]['image'] ?>" height='100px' width='100px'>
    <p><a href="" onclick="changePhoto();
            return false;">Change Photo</a></p>
        <p><a href='' onclick='showPasswordPanel();return false;'>Change Password</a></p>
</div>
    </div>

