<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$plugin = strtolower($this->request->getParam('plugin'));
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes user-scalable=no">
    <meta name="theme-color" content="#2e2c2d">
    <?= $this->fetch('meta') ?>

    <!-- Styles -->
    <?= $this->Html->css([
        'Ypunto/Admin.main',
    ]) ?>

    <?= $this->fetch('css') ?>

    <title><?= $this->fetch('title', 'Admin yPunto') ?></title>
</head>
<body>

<div class="ypunto-app<?= $plugin ? " ypunto-plugin-{$plugin}" : null ?>">
    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>

</div>

<?= $this->Html->script([
    'Ypunto/Admin.jquery.min.js',
    'Ypunto/Admin.bootstrap.min.js',
    sprintf('Ypunto/Admin.%s.js', Configure::read('debug') ? 'vue' : 'vue.min'),
]) ?>

<?= $this->fetch('vue-components') ?>
<?= $this->Html->script('Ypunto/Admin.main.js') ?>
<?= $this->fetch('script') ?>

</body>
</html>
