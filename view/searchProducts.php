<?php require 'header.php'; ?>

<div class="row">
    <div class="main">
        <h2>Read products</h2>
        <form method="GET" action="index.php" class="search js-live-search" data-endpoint="index.php?act=products&op=search&ajax=1" data-target="#products-results">
            <input type="hidden" name="act" value="products">
            <input type="hidden" name="op" value="search">
            <input type="text" placeholder="search" name="search" id="search">
            <input type="submit" name="submit" value="search">
        </form>
        <div id="products-results">
            <?= $result; ?>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>
