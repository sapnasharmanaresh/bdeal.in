<?php
ob_start();
foreach($this->detail as $key => $value){
?>
<table>
    <tr>
        <td>Product name</td>
        <td><?php echo $value['name'] ?></td>
    </tr>
    <tr>
        <td>Description </td>
        <td><?php echo $value['description']?></td>
    </tr>
</table>
 












<?php

$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf -> load_html($html);
$dompdf -> render();
$dompdf -> stream($value['name']." --- productDescription.pdf");
}
?>
