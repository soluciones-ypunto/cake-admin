<?php
/**
 * Created by javier
 * Date: 05/07/18
 * Time: 20:20
 */
/** @var \App\View\AppView $this */
?>
<div class="row pt-3">
    <div class="col-md-8">
        <h1 class="display-2">Gran título</h1>
        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores atque dolor explicabo
            illum impedit labore laboriosam laudantium maxime, nemo odio odit, quos recusandae suscipit vel.
            Beatae laudantium numquam voluptas.
        </p>
        <h4>Íconos</h4>
        <p class="lead">
            <i class="fas fa-book-open fa-fw" title="fas fa-book-open"></i>
            <i class="fas fa-head-side-cough-slash fa-fw" title="fas fa-head-side-cough-slash"></i>
            <i class="fas fa-head-side-mask fa-fw" title="fas fa-head-side-mask"></i>
            <i class="fas fa-virus fa-fw" title="fas fa-virus"></i>
            <i class="fas fa-house-user fa-fw" title="fas fa-house-user"></i>
            <i class="fas fa-satellite fa-fw" title="fas fa-satellite"></i>
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis commodi doloribus impedit maxime
            nesciunt non placeat porro? Consequatur culpa dicta numquam optio qui rerum! Amet consequuntur debitis
            laudantium nobis.
        </p>
    </div>
    <div class="col-md pt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Un ejemplo de card</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias doloremque molestias vitae.
                    A ad, delectus esse et eveniet numquam odio porro vitae?
                </p>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-outline-primary btn-lg"><i class="fas fa-box-open"></i> Call to action</button>
            </div>
        </div>
    </div>
</div>

<hr>

<h2 class="mb-3">Nuevo Post</h2>
<div class="row">
    <div class="col-md-8">
        <form action="">
            <div class="form-group">
                <label class="sr-only" for="title">Nombre</label>
                <input class="form-control form-control-lg" name="title" id="title" placeholder="Título" type="text"/>
            </div>
            <div class="form-group">
                <label for="resumen">Resumen</label>
                <input class="form-control" name="resumen" id="resumen" type="text"/>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea class="form-control" name="contenido" id="contenido" rows="8"></textarea>
            </div>
        </form>
        <p class="text-muted small">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dignissimos impedit modi mollitia
            repellat unde, voluptatum. Aperiam, aspernatur aut consequatur deleniti doloremque facilis necessitatibus nihil voluptates. Distinctio natus nulla vel.
        </p>
        <p class="text-muted small">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dignissimos impedit modi mollitia
            repellat unde, voluptatum. Aperiam, aspernatur aut consequatur deleniti doloremque facilis necessitatibus nihil voluptates. Distinctio natus nulla vel.
        </p>
    </div>
    <div class="col-md-4">
        <div class="card sticky-top" style="top: 60px">
            <div class="card-header bg-white">
                <h6 class="mb-0">Publicar</h6>
            </div>
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam et excepturi exercitationem
                    iusto neque numquam perferendis quasi totam, veritatis voluptatum? Aliquam error facere
                    fuga nisi porro, quidem quod tempora tenetur.
                </p>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-secondary"><i class="fas fa-save"></i> Guardar</button>
                <button class="btn btn-primary"><i class="fas fa-cloud-upload-alt"></i> Publicar</button>
            </div>
        </div>
    </div>
</div>

<hr>

<h2 class="display-4">Un título de sección</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium error, est excepturi expedita
    fugit illo nemo nihil quo repudiandae rerum sit ut, voluptates! Dolores excepturi exercitationem
    labore maxime totam.
</p>
<p class="text-center">
    <a href="#modal" class="btn btn-primary btn-lg" data-bs-toggle="modal">Abril Modal</a>
</p>
<hr>
<div class="row">
    <div class="col-md">
        <h3>Bloque destacado</h3>
        <p class="text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure officia possimus ratione
            repellendus tenetur voluptatibus, voluptatum? Dicta esse quae qui sint, suscipit tenetur ullam!
            Dicta eaque necessitatibus nisi provident tenetur.
        </p>
    </div>
    <div class="col-md">
        <h3>Bloque destacado</h3>
        <p class="text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure officia possimus ratione
            repellendus tenetur voluptatibus, voluptatum? Dicta esse quae qui sint, suscipit tenetur ullam!
            Dicta eaque necessitatibus nisi provident tenetur.
        </p>
    </div>
    <div class="col-md">
        <h3>Bloque destacado</h3>
        <p class="text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure officia possimus ratione
            repellendus tenetur voluptatibus, voluptatum? Dicta esse quae qui sint, suscipit tenetur ullam!
            Dicta eaque necessitatibus nisi provident tenetur.
        </p>
    </div>
</div>

<div class="" style="min-height: 30rem"></div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>