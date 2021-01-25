<?php
/**
 * Created by javier
 * Date: 16/6/20
 * Time: 19:18
 */
/**
 * @var \App\View\AppView $this
 * @var \Cake\Form\Form $form
 * @var array $marcas
 * @var array $etiquetas
 */
?>

<div class="ypunto-content cosas add">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Formulario Demo') ?></h1>

        <div class="btn-toolbar actions-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group actions-shared">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-list"></i> <span class="d-none d-sm-inline">%s</span>', __('Listado')),
                    '#',
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

            </div>
        </div>
    </header>

    <?= $this->Form->create($form, ['class' => 'ypunto-form']) ?>

    <section class="ypunto-form-main">
        <fieldset>
            <?= $this->Form->control('nombre', [
                'placeholder' => 'Ingrese el nombre',
                'label' => false,
                'class' => 'form-control-lg',
                'autofocus',
            ]) ?>
            <?= $this->Form->control('email') ?>
            <?= $this->Form->control('contenido') ?>
            <?= $this->Form->control('fecha_publicacion') ?>
            <?= $this->Form->control('fecha_hora_alta') ?>

            <div class="form-row">
                <div class="col-md">
                    <?= $this->Form->control('etiquetas', [
                        'multiple' => 'checkbox',
                        'options' => $etiquetas,
                        'custom' => true,
                        'inline' => true,
                    ]) ?>

                </div>
                <div class="col-md">
                    <?= $this->Form->control('etiqueta_principal', [
                        'type' => 'radio',
                        'options' => $etiquetas,
                        'custom' => true,
                        'inline' => true,
                    ]) ?>

                </div>
            </div>

            <hr>
            <h4 class="font-weight-light">Elementos Nativos <small class="text-muted">(No custom)</small></h4>
            <div class="form-row">
                <div class="col-md">
                    <?= $this->Form->control('mas_marcas', [
                        'multiple' => 'checkbox',
                        'label' => 'Seleccione las marcas que quiera...',
                        'options' => $marcas,
                        'inline' => true,
                    ]) ?>

                </div>
                <div class="col-md">
                    <?= $this->Form->control('mas_marcas_2', [
                        'multiple' => 'checkbox',
                        'label' => 'Seleccione las marcas que quiera...',
                        'options' => $marcas,
                    ]) ?>

                </div>
                <div class="col-md">
                    <?= $this->Form->control('marca_destacada', [
                        'type' => 'radio',
                        'label' => 'Seleccione la mejor marca',
                        'options' => $marcas,
                    ]) ?>

                </div>
                <div class="col-md">
                    <?= $this->Form->control('marca_destacada_2', [
                        'type' => 'radio',
                        'label' => 'Seleccione la mejor marca',
                        'options' => $marcas,
                        'inline' => true
                    ]) ?>

                </div>
            </div>
        </fieldset>
    </section>

    <section class="ypunto-form-aside">
        <div class="card">
            <div class="card-body bg-light">
                <!--
                En esta columna secundaria se ponen campos que no precisan de mucho espacio para ingresarlos,
                por ej.:  números, checboxes, radios, select chicos, etc. También para información de texto breve
                información adicional u opcional, también puede utilizar el espacio para textos de ayuda, aclaraciones
                etc. organizar el formulario mejora la usabilidad y la experiencia de usuario
                -->
                <p class="card-title mb-1"><i class="fas fa-fw fa-question-circle"></i> <?= __('Otros datos') ?></p>
                <p class="text-muted small mb-0">
                    <?= __('Complete todos los datos.') ?>

                </p>
            </div>
            <div class="card-body border-top">
                <fieldset>
                    <?= $this->Form->control('habilitado', ['custom' => true]) ?>
                    <?= $this->Form->control('cantidad') ?>
                    <?= $this->Form->control('marca', [
                        'options' => $marcas,
                        'custom' => true,
                        'empty' => '— Seleccione marca'
                    ]) ?>
                    <?= $this->Form->control('marca_confirm', [
                        'label' => 'Input Radio',
                        'options' => $marcas,
                        'type' => 'radio',
                        'custom' => true,
                    ]) ?>

                </fieldset>
            </div>
        </div>

        <div class="card ypunto-actions-card">
            <?= $this->element('Entity/actions', ['entity' => null]) ?>

        </div>
    </section>
    <?= $this->Form->end() ?>

</div>