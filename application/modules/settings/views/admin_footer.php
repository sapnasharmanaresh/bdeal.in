<table class='table'>
    <tr>
        <th colspan='3'>Available footer links are</th>
    </tr>
    <tr>


        <td>
            <form name='form' method='post' action=''>
                <select>
                    <option value='aboutus'>About us</option>
                    <option value='careers'>Careers</option>
                    <option value='sellWithUs'>Sell with us</option>
                    <option value='disclosure'>Responsible Disclosure Policy</option>
                    <option value='faq'>Frequently asked questions</option>
                    <option value='beOwner'>Be an owner</option>
                    <option value='shipping'>shipping</option>
                    <option value='cancellation'>Cancellation</option>
                    <option value='returns'>Returns</option>
                </select>
        </td>
    </tr>
    <tr>
        <td>
            <textarea rows='15' cols='30' name='content'><?php
                if (file_exists('content.txt')) {
                    $f = fopen('content.txt', 'r');
                    echo fread($f, filesize('content.txt'));
                    fclose($f);
                }
                ?></textarea>
        </td>
    </tr>

    <tr>
        <td>

            <input type='submit' name='save' value='Save' class='btn'>
            </form>

        </td>
    </tr>

</table>



<script>
    function upload() {
        document.form2.submit();
        //alert(3);
    }
    function func() {
        document.getElementById('f').click();
        //alert(1);
    }
</script>



<form name='social-links'>
    <table class='table'>
        <tr>
            <th>Social Links</th>
        </tr>
        <tr>
            <td>
                <select name='social'>
                    <option value='facebook'>Facebook</option>
                    <option value='twitter'>Twitter</option>
                    <option value='google+'>Google+</option>
                    <option value='linkedIn'>LinkedIn</option>
                    <option value='github'>Github</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Enter link to the selected option
    <input type='text' name='social-href'>
            </td>
        </tr>
        <tr>
            <td><input type='submit' name='save' class='btn' value='Save Changes'></td>
        </tr>
    </table>

    
</form>