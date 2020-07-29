<?php
/**
 * Soluciones yPunto. Html5 powered solutions.
 * CakePHP Responsive Template Admin made with Bootstrap 4.
 *
 * @link https://github.com/soluciones-ypunto/cake-admin
 * @copyright Copyright (c) Soluciones yPunto SAS (https://solucionesypunto.com).
 *
 * @var \DemoApp\View\AppView $this
 * @var \Cake\ORM\Entity $entidad
 */
?>

<div class="ypunto-content entidades add">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Crear Entidad') ?></h1>

        <div class="btn-toolbar actions-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group actions-shared">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-list"></i> <span class="d-none d-sm-inline">%s</span>', __('Listado')),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

            </div>
        </div>
    </header>

    <?= $this->element('_form') ?>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <div class="dropdown-divider"></div>
<?php $this->end() ?>
