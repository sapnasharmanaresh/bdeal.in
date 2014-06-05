
    <div class="user-register ">
        <form name="add-emp" method="post" action="" >
            <table>
                <tr>

                    <td>
                        <input type="text" name="name" placeholder="Employee Name">   
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="email" name="email" placeholder="Valid Email address">   
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="tel" name="contact" placeholder="Contact Number">   
                    </td>
                </tr>
                <input type="hidden"  value="<?php echo $this->role; ?>" name="role">  


                <tr>

                    <td>
                        <input type="submit"  value="add" name="add">   
                    </td>
                </tr>
            </table> 

        </form>
        <?php
//echo $this->msg;
        if (isset($this->msg)) {
            echo $this->msg;
        }
        ?>
    </div>