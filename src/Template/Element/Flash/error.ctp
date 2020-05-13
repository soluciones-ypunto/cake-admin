<?php
/**
 * Created by javier
 * Date: 09/07/18
 * Time: 22:53
 */
/**
 * @var \Cake\View\View $this
 * @var string            $message
 * @var array             $params
 */

$dismissible = !array_key_exists('dismissible', $params) || ($params['dismissible'] === true);
?>
<div class="alert alert-danger <?= $dismissible ? 'alert-dismissible' : null ?> fade show" role="alert">
    <div class="media">
        <i class="fas fa-exclamation-circle alert-icon"></i>
        <div class="media-body">
            <?php if (!empty($params['title'])): ?>
                <h4 class="alert-heading"><?= h($params['title']) ?></h4>
            <?php endif; ?>

            <p class="mb-0">
                <?= $message ?>
            </p>
        </div>
    </div>

    <?php if ($dismissible): ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
    <?php endif; ?>
</div>
