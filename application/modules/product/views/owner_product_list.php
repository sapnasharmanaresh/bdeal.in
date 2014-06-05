<?php
/**
 * Get id from header
 */



/**
 * if delete it ,then delete that product from listing
 */
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    /**
     * Delete product from listing 
     */
    ?>

    <?php
}
/*
 * if manage then give priviledge to owner to change the detailing of items
 */
if (isset($_GET['manage'])) {
    $manage_id = $_GET['manage'];
    ?>
    Search<input type="search-product">
    <table class="table">
        <tr>
            <th>Sr no</th>
            <th>Product_id</th>
            <th>Product_name</th>
            <th>Product_description</th>
            <th>Category</th>
            <th>Sub-category</th>
            <th>Price</th>
            <th>Status</th>
            <?php
            /**
             * Status could be out of stock,enable,disable.delete,available
             */
            ?>
            <th>Privilege</th>   
        </tr>
        <?php
        $i = 1;
        foreach ($res as $key => $value) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php $value['']; ?></td>
                <td><input type="text" value="<?php $value['']; ?>"></td>
                <td><input type="text" vaue="<?php $value['']; ?>"></td>
                <td>
                    <select>
                        <option><?php /** List of all the categories  and selected * */ ?></option>
                        <option selected><?php $value['']; ?></option>
                    </select>
                </td>
                <td>
                    <select>
                        <option><?php /* List of sub categories ........ change if category get changed */ ?></option>
                        <option selected><?php $value['']; ?></option>
                    </select>
                </td>
                <td><input type="text" value="<?php $value['']; ?>"></td>
                <td>
                    <?php
                    /**
                     * When owner change product's status then check for any order which has this item in list ........ then alert a message about the
                     * same 
                     * Kindly ensure all products are delivered then only change its status
                     */
                    ?>
                    <select>
                        <option  <?php if ($value[''] == "Available") echo "Selected"; ?>>Available</option>
                        <option  <?php if ($value[''] == "Out of Stock") echo "Selected"; ?>>Out of Stock</option>
                        <option  <?php if ($value[''] == "Enable") echo "Selected"; ?>>Enable</option>
                        <option  <?php if ($value[''] == "Disable") echo "Selected"; ?>>Disable</option>
                        <option  <?php if ($value[''] == "Delete") echo "Selected"; ?>>Delete</option>
                    </select>
                </td>
                <td><a href="?manage=<?php $value['id']; ?>">Manage</a><a href="?delete=<?php $value['id']; ?>">Delete</a></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
    <?php
}

/**
 * else show the list of all the products 10 at a time
 * 
 */
else {
    ?>
    Search<input type="search-product">
    <table class="table">
        <tr>
            <th>Sr no</th>
            <th>Product_id</th>
            <th>Product_name</th>
            <th>Product_description</th>
            <th>Category</th>
            <th>Sub-category</th>
            <th>Price</th>
            <th>Status</th>
            <?php
            /**
             * Status could be out of stock,enable,disable.delete,available
             */
            ?>
            <th>Privilege</th>   
        </tr>
    <?php
    $i = 1;
    foreach ($this->res as $key => $value) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['product_id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['description']; ?></td>
                <td><?php echo $value['category_name']; ?></td>
                <td><?php echo $value['subcategory']; ?></td>
                <td><?php echo $value['price']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><a href="?manage=<?php echo $value['id']; ?>">Manage</a><a href="?delete=<?php echo$value['id']; ?>">Delete</a></td>
            </tr>
        <?php
        $i++;
    }
    ?>
    </table>
    <?php
    /**
     * show 10 entries at each page 
     * handle this out
     */
  //  for($i = 1; $i<=$this->count/10;$i++){
    ?>    <a href="?id=$i"><?php echo $i; ?></a>
        <?php
    //}
    ?>
        <?php
    }

    ?>