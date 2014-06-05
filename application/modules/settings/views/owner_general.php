<form name='generalSettings' action ='<?php echo BASEURL ?>owner/settings/general' method='post' enctype='multipart/form-data'>
    <div class='right'>
        <input type='submit' value='Save' class='btn'name='saveGeneralSettings'>
    </div>

    <table class='table'>
        <tr>
            <th colspan="2">Store details</th>

        </tr>
        <?php
       // print_r($this->details);
        foreach ($this->details as $key => $value) {
            $shop_name = $value['shop_name'];
            $homepageTitle = $value['homepageTitle'];
            $description = $value['description'];
            $email = $value['email'];
            $invoiceAddress = $value['invoiceAddress'];
           $number = $value['contact'];
           $logo = $value['logo'];
        }
        ?>
        <tr>
            <td>Store name</td>
            <td><input type="text" name="shopName" value="<?php if(isset($shop_name))echo $shop_name ?>"></td>
        </tr>
        <tr>
            <td>Store Homepage Title</td>
            <td><input type="text" name="homepageTitle" value="<?php if(isset($homepageTitle))echo $homepageTitle ?>"</td>
        </tr>
        <tr>
            <td>Store Description</td>
            <td><textarea name="shopDescription" ><?php if(isset($description))echo $description; ?></textarea></td>
        </tr>
        <tr>
            <td>Shop Logo</td>
            <td><img src='<?php echo SHOPLOGO.$logo ?>' height='100px' width='100px'>
                   <p> or change</p>
                   <input type='file' name='shopLogo'>
                </td>
        </tr>
        <tr>
        <th colspan='2'>
            Other Settings
        </th>
        </tr>
        <tr>
            <td>We 'll email you on </td>
            <td><input type='text' name='email' value='<?php if(isset($email))echo $email ?>'></td>
        </tr>
        <tr>
            <td>Invoice Address</td>
            <td><textarea name='invoiceAddress'><?php if(isset($invoiceAddress))echo $invoiceAddress; ?></textarea></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><input type='text' name='contact' value='<?php if(isset($number))echo  $number; ?>'></td>
        </tr>
          

    </table>
</form>