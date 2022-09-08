<?php
/**
 * Created by javier
 * Date: 08/07/18
 * Time: 12:53
 *
 * @var \App\View\AppView $this
 */
?>

<nav class="navbar navbar-expand-md navbar-dark navbar-ypunto bg-dark fixed-top">
    <!-- botón apertura/cierre menú lateral -->
    <ul class="navbar-nav d-lg-none">
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="sidebar">
                <i class="fas fa-bars fa-fw"></i>
            </a>
        </li>
    </ul>

    <!-- lateral -->
    <div class="navbar-brand d-flex d-md-none d-lg-flex align-self-stretch">
        <!-- logo -->
        <img class="img-fluid align-self-center" src="<?= $this->Url->image('Ypunto/Admin.logo-min.png') ?>" style="max-height: 26px"
             alt="<?= __d('admin-ypunto', 'Soluciones Ypunto') ?>">
    </div>

    <!-- botón de apertura/cierre de menú superior -->
    <ul class="navbar-nav d-md-none">
        <li class="nav-item">
            <a class="nav-link" href="#topbarContent" data-bs-toggle="collapse" aria-controls="topbarContent" aria-expanded="false" aria-label="<?= __d('admin-ypunto', 'Desplegar/contraer Menú') ?>">
                <i class="fas fa-cog fa-fw"></i>
            </a>
        </li>
    </ul>

    <!-- ítems del menú superior -->
    <div class="collapse navbar-collapse" id="topbarContent">

        <!-- buscador -->
        <div class="ms-auto col col-md-4 col-xl-3 py-2 py-md-0">
            <form class="form-inline form-search">
                <div class="input-group input-group-sm w-100">
                    <input class="form-control" type="search" placeholder="<?= __d('admin-ypunto', 'Buscar') ?>" aria-label="<?= __d('admin-ypunto', 'Buscar') ?>">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- inicio y acciones rápidas -->
        <ul class="navbar-nav order-first">
            <li class="nav-item d-none d-lg-inline-block">
                <a class="nav-link" href="#" data-toggle="sidebar">
                    <i class="fas fa-bars fa-fw"></i>
                </a>
            </li>
            <?php if ($this->Blocks->exists('ypunto-quick-actions')): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-tools fa-fw"></i> <?= __('Ir a') ?>
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                    <?= $this->fetch('ypunto-quick-actions') ?>
                </div>
            </li>
            <?php endif; ?>
        </ul>

        <!-- menú de login -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i> Roberto Pérez
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdownMenuLink">
                    <h6 class="dropdown-header">Sesión Iniciada</h6>
                    <div class="px-4 py-2">
                        <div class="media">
                            <i class="fas fa-user-circle fa-3x me-3"></i>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Roberto Pérez</h5>
                                <p class="text-muted">Administrador</p>
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="fas fa-fw"></i> Cambiar contraseña</a></li>
                                    <li><a href="#"><i class="fas fa-pencil-alt fa-fw"></i> Editar Perfil</a></li>
                                    <li><a href="#"><i class="fas fa-sign-out-alt fa-fw"></i> Salir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-fw"></i> Cambiar contraseña</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt fa-fw"></i> Editar Perfil</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-fw"></i> Salir</a>

                    <div class="dropdown-divider"></div>
                    <div class="row px-4 py-2" style="min-width: 350px">
                        <div class="col">
                            <a href="#" class="btn btn-outline-default"><i class="fas fa-pencil-alt fa-fw"></i> Perfil</a>
                        </div>
                        <div class="col text-right">
                            <a href="#" class="btn btn-outline-primary"><i class="fas fa-sign-out-alt fa-fw"></i> Salir</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
