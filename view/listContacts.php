<?php require 'header.php'; ?>

<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
    <div class='btn'><a href="?act=contact&op=create">Create new Contacts</a></div>
        <?= $result; ?>
    </div>
</div>

<?php require 'footer.php' ?>