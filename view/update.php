<?php require 'header.php'; ?>

<div class="row">
    <div class="main">
        <h2>Update contact</h2>
        <form method="post" class="crud-form">

            <label for="name">Name: </label>
            <input type="text" id="name" name="name" value="<?= $name; ?>"><br>

            <label for="email">email: </label>
            <input type="email" id="email" name="email" value="<?= $email; ?>"><br>

            <label for="phone">Phone: </label>
            <input type="tel" id="phone" name="phone" value="<?= $phone; ?>"><br>

            <label for="address">address: </label>
            <input type="text" id="address" name="address" value="<?= $address; ?>"><br>

            <input type="submit" name="submit" value="submit" >
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>