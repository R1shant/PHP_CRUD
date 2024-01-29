<?php require 'header.php'; ?>

<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
        <h2>Read products</h2>
        <div class='btn'><a href="?act=products&op=create">Create new Product</a></div>
        <form method="POST" action="index.php?act=products&op=search" class="search">
            <input type="text" placeholder="search" name="search" id="search">
            <input type="submit" name="submit" value="search">
        </form>
        <?= $products; ?>
        <?= $pagebuttons; ?>
        <?= isset($msg) ? "<div class='feedback-msg'>".$msg."</div>" :null; ?>
    </div>
</div>

<?php require 'footer.php' ?>
