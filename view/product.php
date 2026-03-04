<?php require 'header.php'; ?>

<div class="row">
    <div class="main">
        <h2>Read product</h2>
        <ul class="detail-list">
            <li><strong>id:</strong> <?= $products['product_id'] ?></li>
            <li><strong>product_type_code:</strong> <?= $products['product_type_code'] ?></li>
            <li><strong>supplier_id:</strong> <?= $products['supplier_id'] ?></li>
            <li><strong>product_name:</strong> <?= $products['product_name'] ?></li>
            <li><strong>product_price:</strong> <?= $products['product_price'] ?></li>
            <li><strong>other_product_details:</strong> <?= $products['other_product_details'] ?></li>
        </ul>
    </div>
</div>

<?php require 'footer.php' ?>
