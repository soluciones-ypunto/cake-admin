<?php
/**
 * Created by javier
 * Date: 09/07/18
 * Time: 11:59
 */
/** @var \Cake\View\View $this */
?>
<nav class="sidebar-nav">
    <h4>Ejemplos</h4>
    <ul class="nav flex-column">
        <li class="nav-item <?= ($this->request->getParam('action') === 'showcase') ? 'active' : null ?>">
            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Examples', 'action' => 'showcase']) ?>">
                <i class="fas fa-solar-panel fa-fw"></i> Showcase
            </a>
        </li>
        <li class="nav-item <?= ($this->request->getParam('action') === 'flash') ? 'active' : null ?>">
            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Examples', 'action' => 'flash']) ?>">
                <i class="fas fa-sticky-note fa-fw"></i> Flash alerts
            </a>
        </li>
        <li class="nav-item <?= ($this->request->getParam('action') === 'index') ? 'active' : null ?>">
            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'index']) ?>">
                <i class="fas fa-users fa-fw"></i> Listados
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-sliders-h fa-fw"></i> Cosas
            </a>
        </li>
    </ul>
</nav>
<nav class="sidebar-nav">
    <h4>Configuraciones</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-wallet fa-fw"></i> Un listado
                <span class="badge badge-pill badge-primary float-right">19</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-object-group fa-fw"></i> Otro listado
                <span class="badge badge-pill badge-danger float-right">4</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fab fa-slack fa-fw"></i> Usuarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw"></i> Cosas
            </a>
        </li>
    </ul>
</nav>
