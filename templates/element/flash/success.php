<?php
/**
 * Created by javier
 * Date: 09/07/18
 * Time: 22:53
 */
/**
 * @var \App\View\AppView $this
 * @var string            $message
 * @var array             $params
 */

$dismissible = !array_key_exists('dismissible', $params) || ($params['dismissible'] === true);
?>
<div class="alert alert-success <?= $dismissible ? 'alert-dismissible' : null ?> fade show" role="alert">
    <div class="d-flex">
        <i class="fas fa-check-circle alert-icon"></i>
        <div class="flex-grow-1">
            <?php if (!empty($params['title'])): ?>
                <h4 class="alert-heading"><?= h($params['title']) ?></h4>
            <?php endif; ?>

            <p class="mb-0">
                <?= $message ?>
            </p>
        </div>
    </div>

    <?php if ($dismissible): ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <?php endif; ?>
</div>
