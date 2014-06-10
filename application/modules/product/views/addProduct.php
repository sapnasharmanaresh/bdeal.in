<?php
if (isset($this->msg)) {
    echo $this->msg;
}
?>
<form action='<?php echo BASEURL; ?>owner/newProduct' method='post' enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th colspan="2">Add Products</th>
        </tr>
        <tr>
            <td>Product Name</td>
            <td> <input type='text' name='product_name'></td>
        </tr>
        <tr>
            <td>Product Description</td>
            <td><textarea name='description'></textarea></td>
        </tr>
        <tr>
            <td>Product Category</td>
            <td><?php Modules::run('category', 'listCategory'); ?> <a href="#addCategory">+ Add category</a></td>
        </tr>
        <tr>
            <td> Product Subcategory</td>
            <td ><select id="subcategory" name="subcat"></select><a href="#addSubCategory">+ Add subcategory</a>
            </td>
        </tr>
        <tr>
            <td> Quantity</td>
            <td><input type='text' name='quantity'></td>
        </tr>
        <tr>
            <td> Price</td>
            <td><input type='text' name='price' ></td>
        </tr>
        <tr>
            <td>Upload product Image</td>
            <td><input type='file' name='prod_image'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn" name="add" value="Add Product"></td>
        </tr>
    </table>

</form>

<form name="upload" action="<?php echo BASEURL ?>owner/newProduct" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th colspan="2">Upload Products </th>
        </tr>
        <tr>
            <td>Select .xls,.csv,.xlsx files</td>
            <td><input type="file" name="uploadProduct"></td>
        </tr>
        <tr>
            <td>Images folder</td>
            <td><input type="file" name="uploadImages"></td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="submit" class="btn" name="upload" value="Upload Products"></td>
        </tr>
    </table>
</form>

<form name="addCategory" id="addCategory" action="<?php echo BASEURL ?>owner/newProduct" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th colspan="2">Add Category</th>
        </tr>
         <tr>
            <td>Category Image</td>
            <td> <input type="file" name="catImage"></td>
        </tr>
        <tr>
            <td>Category Name</td>
            <td><input type="text" name="newCategory"></td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" class="btn" name="addCategory" value="Add category"></td>
        </tr>
    </table>
</form>

<form name="addSubCategory" id="addSubCategory" action="<?php echo BASEURL ?>owner/newProduct" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th colspan="2">Add Sub Category</th>
        </tr>

        <tr>
            <td>Select Category</td>
            <td><?php Modules::run('category', 'listCategory') ?></td>
        </tr>

        <tr>
            <td>New Subcategory</td>
            <td> <input type="text" name="newSubCategory"></td>
        </tr>
        <tr>
            <td>Minimum Price</td>
            <td> <input type="text" name="minimumPrice"></td>
        </tr>
        <tr>
            <td>Maximum Price</td>
            <td> <input type="text" name="maximumPrice"></td>
        </tr>
        <tr>
            <td>Subcategory Image</td>
            <td> <input type="file" name="subcatImage"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn" name="addSubCategory" value="Add subcategory"></td>
        </tr>
    </table>


</form>
