<?php
/**
 * Created by javier
 * Date: 05/07/18
 * Time: 20:12
 */

namespace Ypunto\Admin\Controller;

use Cake\Event\Event;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

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

    /**
     * @return \Cake\Http\Response|void
     */
    public function forms()
    {
        $form = new class extends Form {

            protected function _buildSchema(Schema $schema)
            {
                return $schema
                    ->addField('nombre', ['type' => 'string'])
                    ->addField('email', ['type' => 'string'])
                    ->addField('contenido', ['type' => 'text'])
                    ->addField('fecha_publicacion', ['type' => 'date'])
                    ->addField('fecha_hora_alta', ['type' => 'timestamp'])
                    ->addField('habilitado', ['type' => 'boolean'])
                    ->addField('cantidad', ['type' => 'integer'])
                    ->addField('marca', ['type' => 'string'])
                ;
            }

            public function buildValidator(Event $event, Validator $validator, $name)
            {
                $validator
                    ->notEmptyString('nombre')
                    ->notEmptyString('marca')
                    ->minLength('contenido', 40, 'Escriba al menos 40 caracteres')
                ;

                return $validator;
            }

            protected function _execute(array $data)
            {
                return true;
            }
        };

        if ($this->request->is('post')) {
            if ($form->execute($this->request->getData())) {
                $this->Flash->success('Bien ahí!');

                return $this->redirect(['action' => 'forms']);
            } else {
                $this->Flash->error('No No No...');
            }
        } else {
            $form->setData([
                'email' => 'unmail@gmail.com',
            ]);
        }

        $marcas = [
            'xbox' => 'Xbox',
            'playstation' => 'PlayStation',
            'nintendo' => 'Nintendo',
            'sega' => 'Sega',
        ];
        $etiquetas = [
            'acción',
            'rts',
            'shooter',
            'aventura',
            'deportes',
            'survival horror',
            'mundo abierto',
            'carreras',
            'simcade',
            'simulador',
            'peleas',
        ];
        $etiquetas = array_combine($etiquetas, array_map('ucwords', $etiquetas));

        $this->set(compact('form', 'marcas', 'etiquetas'));
    }
}