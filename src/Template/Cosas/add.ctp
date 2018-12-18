<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Cosa $cosa
 * @var \Ypunto\Admin\Model\Entity\Entidad[]|\Cake\Collection\CollectionInterface $entidades
 */
?>

<div class="ypunto-content cosas add">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Crear Cosa') ?></h1>

        <div class="btn-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group">
                <?= $this->Html->link(
                    __('{icon} Volver al listado', ['icon' => '<i class="fas fa-fw fa-angle-left"></i>']),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

            </div>
        </div>
    </header>

    <?= $this->Form->create($cosa, ['class' => 'ypunto-form']) ?>

    <section class="ypunto-form-main">
        <fieldset>
            <?= $this->Form->control('entidad_id', ['options' => $entidades]) ?>
            <?= $this->Form->control('nombre') ?>
            <?= $this->Form->control('descripcion') ?>
        </fieldset>
    </section>

    <section class="ypunto-form-aside">
        <div class="card ypunto-actions-card">
            <div class="card-body bg-light">
                <em class="text-muted small">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <?= __('Complete toda la información') ?>
                </em>
            </div>
            <div class="card-body border-top">
                <div class="btn-group">
                    <?= $this->Form->button(
                        __('{icon} Guardar cambios', ['icon' => '<i class="far fa-fw fa-save"></i>']),
                        ['escape' => false]
                    ) ?>

                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button type="submit" class="dropdown-item" name="_nextAction" value="add">
                            <i class="fas fa-fw fa-save"></i> <?= __('Guardar y crear nuevo') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body bg-light">
                <h5 class="card-title"><?= __('Información Complementaria') ?></h5>
                <p class="text-muted small mb-0">
                    <em>
                        <i class="fas fa-question-circle"></i>
                        <?= __('Usar este espacio para agrupar la información y mejorar la usabilidad.') ?>
                    </em>
                </p>
            </div>
            <div class="card-body border-top">
                <fieldset>
                    <?= $this->Form->control('precio') ?>
                    <?= $this->Form->control('cantidad') ?>
                </fieldset>
            </div>
        </div>
    </section>
    <?= $this->Form->end() ?>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Cosa') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Cosas') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Entidades') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
<?php $this->end() ?>
