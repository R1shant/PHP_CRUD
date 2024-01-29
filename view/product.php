<?php require 'header.php'; ?>

<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
    <ul>
        <li>id: <?= $products['product_id'] ?></li>
        <li>product_type_code: <?= $products['product_type_code'] ?></li>
        <li>supplier_id: <?= $products['supplier_id'] ?></li>
        <li>product_name: <?= $products['product_name'] ?></li>
        <li>product_price: <?= $products['product_price'] ?></li>
        <li>other_product_details: <?= $products['other_product_details'] ?></li>
    </ul>
    </div>
</div>

<?php require 'footer.php' ?>
