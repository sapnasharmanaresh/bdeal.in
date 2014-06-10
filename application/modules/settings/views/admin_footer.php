Available footer links are

<a href="">About Us</a>

<div>
    <form name='form' method='post' action=''>
        <textarea rows='15' cols='30' name='content'><?php
            if (file_exists('content.txt')) {
                $f = fopen('content.txt', 'r');
                echo fread($f, filesize('content.txt'));
                fclose($f);
            }
            ?></textarea>
        <img src='' id='img'>

      <!--  <input type='button' name='media' value='Add Media' onclick='func();'>-->
        <input type='hidden' name='img_path' id='img_path' value=''>
        <input type='submit' name='save' value='Save'>
    </form>

    <!--<form name='form2' method='post' action='' target='img' enctype='multipart/form-data'>
        <input type='file' name='file' id='f' style='display:none;' onchange='upload()' >
        <input type='hidden' name='hid'>	
    </form>
    -->
</div>
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
