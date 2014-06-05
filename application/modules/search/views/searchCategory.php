
<?php
foreach ($this->product as $k => $value) {
    $max_price = $value['maximum_price'];
    $min_price = $value['minimum_price'];
    $category = $value['category_name'];
    $subcategory = $value['subcategory'];
}

 $diff = ceil(($max_price - $min_price) / 4) - 1;
?>

<div class='breadcrumb'>
    <span class='breadcrumb__value'><a href='<?php echo BASEURL .'product/category/'.$category?>'><?php echo $category; ?></a></span>
    <span class='separator'>=></span>
    <span class='breadcrumb__value'><a href='<?php echo BASEURL .'product/category/'.$category.'/'.$subcategory?>'><?php echo $subcategory; ?></a></span>
</div>
<table class='table'>
    <tr>
        <th colspan='2'>By Price</th>
    </tr>
    <tr>
        <td><input type="checkbox"></td>
        <td>High to Low</td>
    </tr>
    <tr>
        <td><input type="checkbox"></td>
        <td>Low to High</td>
    </tr>

    <tr>
        <th colspan='2'>By Price range</th>
    </tr>
    <tr>
        <td><input type="checkbox"></td>
        <td>Rs<?php echo $price = $min_price ?> - Rs.<?php echo $price = $price+$diff ?></td>
    </tr>
    <tr>
        <td><input type="checkbox"></td>
        <td>Rs.<?php echo $price = $price+1 ?> - Rs.<?php echo $price = $price+$diff ?></td>
    </tr>
    <tr>
        <td><input type="checkbox"></td>
        <td>Rs.<?php echo $price = $price+1 ?> - Rs.<?php echo $price = $price+$diff ?></td>
    </tr>
    <tr>
        <td><input type="checkbox"></td>
        <td>Rs.<?php echo $price = $price+1 ?> - Rs.<?php echo $price = $price+$diff-1 ?></td>
    </tr>
    <tr>
        <th colspan='2'>By shop</th>
    </tr>
    <tr>
        <?php Modules::run('shop', 'getList'); ?>
    </tr>


</table>

