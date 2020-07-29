<?php
/**
 * Soluciones yPunto. Html5 powered solutions.
 * CakePHP Responsive Template Admin made with Bootstrap 4.
 *
 * @link https://github.com/soluciones-ypunto/cake-admin
 * @copyright Copyright (c) Soluciones yPunto SAS (https://solucionesypunto.com).
 *
 * @var \DemoApp\View\AppView $this
 * @var \Cake\ORM\Entity $cosa
 */
?>
<?= $this->Form->create($cosa, ['class' => 'ypunto-form']) ?>

<section class="ypunto-form-main">
    <fieldset>
        <?= $this->Form->control('nombre') ?>
        <?= $this->Form->control('descripcion') ?>
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
                <?= $this->Form->control('entidad_id') ?>
                <?= $this->Form->control('precio') ?>
                <?= $this->Form->control('cantidad') ?>
            </fieldset>
        </div>
    </div>

    <div class="card ypunto-actions-card">
        <?= $this->element('Entity/actions', ['entity' => $cosa]) ?>

    </div>
</section>
<?= $this->Form->end() ?>
