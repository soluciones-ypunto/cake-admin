<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Grupo $grupo
 */
?>

<div class="ypunto-content grupos view">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= h($grupo->nombre) ?></h1>

        <div class="btn-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group">
                <?= $this->Html->link(
                    __('{icon} Volver al listado', ['icon' => '<i class="fas fa-fw fa-angle-left"></i>']),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    __('{icon} Editar', ['icon' => '<i class="fas fa-fw fa-pencil-alt"></i>']),
                    ['action' => 'edit', $grupo->id],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

            </div>
            <?= $this->Form->postLink(
                __('{icon} Eliminar', ['icon' => '<i class="fas fa-fw fa-trash"></i>']),
                ['action' => 'delete', $grupo->id],
                ['confirm' => __('Eliminar este registro?'), 'class' => 'btn btn-sm btn-danger ml-4', 'escape' => false]
            ) ?>

        </div>
    </header>

    <div class="ypunto-view">
        <section class="ypunto-view-main">
            <div class="card ypunto-view-info">
                <div class="card-body strings">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Nombre') ?></div>
                        <div class="col val"><?= h($grupo->nombre) ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ypunto-view-aside">
            <div class="card ypunto-actions-card">
                <div class="card-body bg-light">
                    <ul class="list-unstyled text-muted small mb-0">
                        <li><i class="fas fa-fw fa-fingerprint"></i> <?= __('Id.') ?> <strong class="text-monospace"><?= $this->Number->format($grupo->id) ?></strong></li>
                        <li><i class="far fa-fw fa-calendar-plus"></i> <?= __('Alta') ?> <strong><?= $grupo->created ?></strong></li>                        <li><i class="far fa-fw fa-calendar-check"></i> <?= __('Modificado') ?> <strong><?= $grupo->modified ?></strong></li>                        <li><i class="fas fa-fw fa-history"></i> <?= __('Historial') ?> <a href="#"><?= __('Versiones anteriores') ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <div class="card related">
        <div class="card-header ypunto-card-header-nav">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#entidades" role="tab" aria-controls="entidades" aria-selected="true">
                        <?= __('Entidades') ?> <span class="badge badge-pill badge-success ml-2"><?= count($grupo->entidades) ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane table-responsive fade show active" id="entidades" role="tabpanel" aria-labelledby="profile-tab">
                <?php if (!empty($grupo->entidades)): ?>
                <table class="table">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Grupo Id') ?></th>
                        <th scope="col"><?= __('Nombre') ?></th>
                        <th scope="col"><?= __('Descripcion') ?></th>
                        <th scope="col"><?= __('Email') ?></th>
                        <th scope="col"><?= __('Estado') ?></th>
                        <th scope="col"><?= __('Habilitado') ?></th>
                        <th scope="col"><?= __('Fecha Nacimiento') ?></th>
                        <th scope="col"><?= __('Fecha Hora') ?></th>
                        <th scope="col"><?= __('Puntos') ?></th>
                        <th scope="col"><?= __('Capital') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($grupo->entidades as $entidades): ?>
                    <tr>
                        <td><?= h($entidades->id) ?></td>
                        <td><?= h($entidades->grupo_id) ?></td>
                        <td><?= h($entidades->nombre) ?></td>
                        <td><?= h($entidades->descripcion) ?></td>
                        <td><?= h($entidades->email) ?></td>
                        <td><?= h($entidades->estado) ?></td>
                        <td><?= h($entidades->habilitado) ?></td>
                        <td><?= h($entidades->fecha_nacimiento) ?></td>
                        <td><?= h($entidades->fecha_hora) ?></td>
                        <td><?= h($entidades->puntos) ?></td>
                        <td><?= h($entidades->capital) ?></td>
                        <td><?= h($entidades->created) ?></td>
                        <td><?= h($entidades->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Entidades', 'action' => 'view', $entidades->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Entidades', 'action' => 'edit', $entidades->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entidades', 'action' => 'delete', $entidades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entidades->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Grupo') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Grupos') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Entidades') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>

<?php $this->end() ?>
