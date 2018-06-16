<?php if(isset($_SESSION['messages']) && is_array($_SESSION['messages'])):?>

        <div class="alert alert-<?= $_SESSION['messages']['type'] ?>" role="alert">
                <?= $_SESSION['messages']['body'] ?>
                <?php unset($_SESSION['messages']); ?>
        </div>

<?php endif;?>
