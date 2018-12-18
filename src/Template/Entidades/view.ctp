<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Entidad $entidad
 */
?>

<div class="ypunto-content entidades view">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= h($entidad->nombre) ?></h1>

        <div class="btn-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group">
                <?= $this->Html->link(
                    __('{icon} Volver al listado', ['icon' => '<i class="fas fa-fw fa-angle-left"></i>']),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    __('{icon} Editar', ['icon' => '<i class="fas fa-fw fa-pencil-alt"></i>']),
                    ['action' => 'edit', $entidad->id],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

            </div>
            <?= $this->Form->postLink(
                __('{icon} Eliminar', ['icon' => '<i class="fas fa-fw fa-trash"></i>']),
                ['action' => 'delete', $entidad->id],
                ['confirm' => __('Eliminar este registro?'), 'class' => 'btn btn-sm btn-danger ml-4', 'escape' => false]
            ) ?>

        </div>
    </header>

    <div class="ypunto-view">
        <section class="ypunto-view-main">
            <div class="card ypunto-view-info">
                <div class="card-body strings">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Grupo') ?></div>
                        <div class="col val"><?= $entidad->has('grupo') ? $this->Html->link($entidad->grupo->nombre, ['controller' => 'Grupos', 'action' => 'view', $entidad->grupo->id]) : '' ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Nombre') ?></div>
                        <div class="col val"><?= h($entidad->nombre) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Email') ?></div>
                        <div class="col val"><?= h($entidad->email) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Estado') ?></div>
                        <div class="col val"><?= h($entidad->estado) ?></div>
                    </div>
                </div>
                <div class="card-body border-top numbers">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Puntos') ?></div>
                        <div class="col val"><?= $this->Number->format($entidad->puntos) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Capital') ?></div>
                        <div class="col val"><?= $this->Number->format($entidad->capital) ?></div>
                    </div>
                </div>
                <div class="card-body border-top dates">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Fecha Nacimiento') ?></div>
                        <div class="col val"><?= h($entidad->fecha_nacimiento) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Fecha Hora') ?></div>
                        <div class="col val"><?= h($entidad->fecha_hora) ?></div>
                    </div>
                </div>
                <div class="card-body border-top booleans">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Habilitado') ?></div>
                        <div class="col val"><?= $entidad->habilitado ? __('Sí') : __('No'); ?></div>
                    </div>
                </div>
                <div class="card-body border-top texts">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Descripcion') ?></div>
                        <div class="col val"><?= $this->Text->autoParagraph(h($entidad->descripcion)); ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ypunto-view-aside">
            <div class="card ypunto-actions-card">
                <div class="card-body bg-light">
                    <ul class="list-unstyled text-muted small mb-0">
                        <li><i class="fas fa-fw fa-fingerprint"></i> <?= __('Id.') ?> <strong class="text-monospace"><?= $this->Number->format($entidad->id) ?></strong></li>
                        <li><i class="far fa-fw fa-calendar-plus"></i> <?= __('Alta') ?> <strong><?= $entidad->created ?></strong></li>                        <li><i class="far fa-fw fa-calendar-check"></i> <?= __('Modificado') ?> <strong><?= $entidad->modified ?></strong></li>                        <li><i class="fas fa-fw fa-history"></i> <?= __('Historial') ?> <a href="#"><?= __('Versiones anteriores') ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <div class="card related">
        <div class="card-header ypunto-card-header-nav">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#etiquetas" role="tab" aria-controls="etiquetas" aria-selected="true">
                        <?= __('Etiquetas') ?> <span class="badge badge-pill badge-success ml-2"><?= count($entidad->etiquetas) ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">
                        <?= __('Audit Logs') ?> <span class="badge badge-pill badge-success ml-2"><?= count($entidad->history) ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#cosas" role="tab" aria-controls="cosas" aria-selected="true">
                        <?= __('Cosas') ?> <span class="badge badge-pill badge-success ml-2"><?= count($entidad->cosas) ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane table-responsive fade show active" id="etiquetas" role="tabpanel" aria-labelledby="profile-tab">
                <?php if (!empty($entidad->etiquetas)): ?>
                <table class="table">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Nombre') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($entidad->etiquetas as $etiquetas): ?>
                    <tr>
                        <td><?= h($etiquetas->id) ?></td>
                        <td><?= h($etiquetas->nombre) ?></td>
                        <td><?= h($etiquetas->created) ?></td>
                        <td><?= h($etiquetas->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Etiquetas', 'action' => 'view', $etiquetas->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Etiquetas', 'action' => 'edit', $etiquetas->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etiquetas', 'action' => 'delete', $etiquetas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etiquetas->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <div class="tab-pane table-responsive fade" id="history" role="tabpanel" aria-labelledby="profile-tab">
                <?php if (!empty($entidad->history)): ?>
                <table class="table">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Transaction') ?></th>
                        <th scope="col"><?= __('Type') ?></th>
                        <th scope="col"><?= __('Primary Key') ?></th>
                        <th scope="col"><?= __('Source') ?></th>
                        <th scope="col"><?= __('Parent Source') ?></th>
                        <th scope="col"><?= __('Original') ?></th>
                        <th scope="col"><?= __('Changed') ?></th>
                        <th scope="col"><?= __('Meta') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($entidad->history as $history): ?>
                    <tr>
                        <td><?= h($history->id) ?></td>
                        <td><?= h($history->transaction) ?></td>
                        <td><?= h($history->type) ?></td>
                        <td><?= h($history->primary_key) ?></td>
                        <td><?= h($history->source) ?></td>
                        <td><?= h($history->parent_source) ?></td>
                        <td><?= h($history->original) ?></td>
                        <td><?= h($history->changed) ?></td>
                        <td><?= h($history->meta) ?></td>
                        <td><?= h($history->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'AuditLogs', 'action' => 'view', $history->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'AuditLogs', 'action' => 'edit', $history->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuditLogs', 'action' => 'delete', $history->id], ['confirm' => __('Are you sure you want to delete # {0}?', $history->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <div class="tab-pane table-responsive fade" id="cosas" role="tabpanel" aria-labelledby="profile-tab">
                <?php if (!empty($entidad->cosas)): ?>
                <table class="table">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Entidad Id') ?></th>
                        <th scope="col"><?= __('Nombre') ?></th>
                        <th scope="col"><?= __('Descripcion') ?></th>
                        <th scope="col"><?= __('Precio') ?></th>
                        <th scope="col"><?= __('Cantidad') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($entidad->cosas as $cosas): ?>
                    <tr>
                        <td><?= h($cosas->id) ?></td>
                        <td><?= h($cosas->entidad_id) ?></td>
                        <td><?= h($cosas->nombre) ?></td>
                        <td><?= h($cosas->descripcion) ?></td>
                        <td><?= h($cosas->precio) ?></td>
                        <td><?= h($cosas->cantidad) ?></td>
                        <td><?= h($cosas->created) ?></td>
                        <td><?= h($cosas->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Cosas', 'action' => 'view', $cosas->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Cosas', 'action' => 'edit', $cosas->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cosas', 'action' => 'delete', $cosas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cosas->id)]) ?>
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
