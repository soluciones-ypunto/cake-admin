<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Grupo $grupo
 */
?>

<div class="ypunto-content grupos add">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Crear Grupo') ?></h1>

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

    <?= $this->Form->create($grupo, ['class' => 'ypunto-form']) ?>

    <section class="ypunto-form-main">
        <fieldset>
            <?= $this->Form->control('nombre') ?>
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
    </section>
    <?= $this->Form->end() ?>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Grupo') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Grupos') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Entidades') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
<?php $this->end() ?>
