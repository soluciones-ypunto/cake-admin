<?php
/**
 * Created by javier
 * Date: 16/3/20
 * Time: 19:50
 */
/**
 * @var \Cake\View\View $this
 * @var \Cake\Datasource\EntityInterface $entity
 */
?>
<div class="card-body bg-light">
    <ul class="list-unstyled text-muted small mb-0">
        <li><i class="fas fa-fw fa-fingerprint"></i> <?= __('Id.') ?> <span class="text-dark ml-2 text-monospace"><?= $this->Number->format($entity->id) ?></span></li>
        <li><i class="far fa-fw fa-calendar-plus"></i> <?= __('Creado') ?> <span class="text-dark ml-2"><?= $entity->created ?></span></li>
        <li><i class="fas fa-fw fa-calendar-day"></i> <?= __('Editado') ?> <span class="text-dark ml-2"><?= $entity->modified ?></span></li>
    </ul>
</div>
