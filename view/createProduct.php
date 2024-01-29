<?php require 'header.php'; ?>

<div class="row">
    <?php  require 'sidebar.php';?>
    <div class="main">
        <form method="post">

            <label for="product_type_code">Product type code: </label>
            <input type="text" id="product_type_code" name="product_type_code" required><br>

            <label for="supplier_id">Supplier id: </label>
            <input type="text" id="supplier_id" name="supplier_id" required><br>

            <label for="product_name">Product name: </label>
            <input type="text" id="product_name" name="product_name" required><br>

            <label for="product_price">Product price: </label>
            <input type="number" min="1" step="any" id="product_price" name="product_price" required><br>

            <label for="other_product_details">Details: </label>
            <input type="text" id="other_product_details" name="other_product_details"><br>

            <input type="submit" name="submit" value="submit" >
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>