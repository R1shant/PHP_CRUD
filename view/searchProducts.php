<?php require 'header.php'; ?>

<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
        <h2>Read products</h2>
        <form method="POST" action="index.php?act=products&op=search" class="search">
            <input type="text" placeholder="search" name="search" id="search">
            <input type="submit" name="submit" value="search">
        </form>
        <?= $result; ?>
    </div>
</div>

<?php require 'footer.php' ?>
