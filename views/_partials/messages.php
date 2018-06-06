<?php if(isset($messages) && is_array($messages)):?>

        <div class="alert alert-<?= $messages['type'] ?>" role="alert">
                <?= $messages['body'] ?>
        </div>

<?php endif;?>
