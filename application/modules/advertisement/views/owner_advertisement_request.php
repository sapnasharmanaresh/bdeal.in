<form name="advertisement-requestToAdmin" action="<?php echo BASEURL; ?>owner/advertisement" method="post" enctype="multipart/form-data">
    <table class='table'>
        <tr>
            <th colspan='2'>
                Request to mall-Admin
            </th>
        </tr>
        <tr>
            <td>
                Upload Image file for advertisement on main page( to mall-admin)
            </td>
            <td>
                <input type="file" name="adverToAdmin"/>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <input type="submit" class='btn' value="Send Request" name="sendToAdmin">
            </td>
        </tr>
    </table>
</form>

<form name="advertisement-requestToOwner" action="<?php echo BASEURL; ?>owner/advertisement" method="post" enctype="multipart/form-data">
    <table class='table'>
        <tr>
            <th colspan='2'>
                Request to Shop Owner
                 </th>
        </tr>
        <tr>
            <td>
                Owner Name
            </td>
                
            <td>
                <input type="text" name="name" >
            </td>

        </tr>
        <tr>
            <td>
                Upload Image file for advertisement on shop page( to shop owner)
           
            </td>
            <td>
                <input type="file" name="adverToOwner"/>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <input type="submit" class='btn' value="Send Request" name="sendToOwner">
            </td>
        </tr>
    </table>
</form>

<a href='' onclick="trackRequest();return false;"  id='trackRequest' class='btn-color3'>Track request</a>
<div id="track" class="track show_none">
    <form name="form" action="<?php echo BASEURL ?>owner/advertisement" method="post">
    <table class="table">
        <tr>
            <td>
                   Enter request number
            </td>
            <td>
                <input type="text" name="trackNumber">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="trackRequest" Value="Track">
            </td>
        </tr>
    </table>
    </form>
    <?php /**
     *  status of request
     */
    ?>
</div>