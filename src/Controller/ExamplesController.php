<?php
/**
 * Created by javier
 * Date: 05/07/18
 * Time: 20:12
 */

namespace Ypunto\Admin\Controller;

class ExamplesController extends AppController
{
    public function index()
    {

    }

    public function flash()
    {
        $this->Flash->success('Probando un mensaje flash de éxito');
        $this->Flash->error('Un mensaje de error con título.', ['params' => ['title' => 'Error']]);
        $this->Flash->set(
            'Estilo de mensaje por defecto. Sín título, no se puede cerrar.',
            ['params' => ['dismissible' => false]]
        );
    }

    public function showcase()
    {

    }

    public function forms()
    {

    }
}