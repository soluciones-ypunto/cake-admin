<?php
/**
 * Created by javier
 * Date: 09/07/18
 * Time: 23:44
 */
/** @var \App\View\AppView $this */
?>
<div class="content-inner">
    <header class="content-header">
        <div class="row justify-content-between">
            <div class="col-lg-auto">
                <h1 class="mb-0">Listado de cosas</h1>
                <p class="text-muted mb-0">Una descripción pobre</p>
            </div>
            <nav class="col-lg-auto" aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Un lugar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listado de cosas</li>
                </ol>
            </nav>
        </div>
    </header>

    <a href="#" class="btn btn-secondary">Nueva cosa</a>
    <nav class="col-lg-auto" aria-label="Page navigation example">
        <ul class="pagination mb-0">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

    <div class="card position-relative">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th class="position-sticky">Id.</th>
                <th class="position-sticky"><a href="#">Nombre</a></th>
                <th class="position-sticky"><a href="#">Email</a></th>
                <th class="position-sticky">Estado</th>
                <th class="position-sticky">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (range(1, 20) as $i): ?>

            <tr>
                <td><?= $i ?></td>
                <td>Juan Pérez</td>
                <td>jperez@gmail.com</td>
                <td>Activo</td>
                <td></td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
