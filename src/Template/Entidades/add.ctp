<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Entidad $entidad
 * @var \Ypunto\Admin\Model\Entity\Grupo[]|\Cake\Collection\CollectionInterface $grupos
 */
?>

<div class="ypunto-content entidades add">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Crear Entidad') ?></h1>

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

    <?= $this->Form->create($entidad, ['class' => 'ypunto-form']) ?>

    <section class="ypunto-form-main">
        <fieldset>
            <?= $this->Form->control('grupo_id', ['options' => $grupos, 'empty' => true]) ?>
            <?= $this->Form->control('nombre') ?>
            <?= $this->Form->control('descripcion') ?>
            <?= $this->Form->control('email') ?>
            <?= $this->Form->control('estado') ?>
            <?= $this->Form->control('habilitado') ?>
            <?= $this->Form->control('fecha_nacimiento') ?>
            <?= $this->Form->control('fecha_hora') ?>
            <?= $this->Form->control('etiquetas._ids', ['options' => $etiquetas]) ?>
        </fieldset>
    </section>

    <section class="ypunto-form-aside">
        <div class="card ypunto-actions-card">
            <div class="card-body bg-light">
                <em class="text-muted small">
                    <i class="fas fa-fw fa-question-circle"></i>
                    Complete toda la información
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
                        <button type="submit" class="dropdown-item" name="_postAction" value="saveAndAdd">
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
                    <?= $this->Form->control('puntos') ?>
                    <?= $this->Form->control('capital') ?>
                </fieldset>
            </div>
        </div>
    </section>
    <?= $this->Form->end() ?>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Grupos') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Grupos', 'action' => 'index']) ?>"><?= __('Listado de Grupos') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Grupos', 'action' => 'add']) ?>"><?= __('Crear Grupo') ?></a>

    <h6 class="dropdown-header"><?= __('History') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'AuditLogs', 'action' => 'index']) ?>"><?= __('Listado de History') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'AuditLogs', 'action' => 'add']) ?>"><?= __('Crear History') ?></a>

    <h6 class="dropdown-header"><?= __('Cosas') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Cosas', 'action' => 'index']) ?>"><?= __('Listado de Cosas') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Cosas', 'action' => 'add']) ?>"><?= __('Crear Cosa') ?></a>

    <h6 class="dropdown-header"><?= __('Etiquetas') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Etiquetas', 'action' => 'index']) ?>"><?= __('Listado de Etiquetas') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Etiquetas', 'action' => 'add']) ?>"><?= __('Crear Etiqueta') ?></a>
<?php $this->end() ?>
