<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Entidades Controller
 *
 * @property \App\Model\Table\EntidadesTable $Entidades
 *
 * @method \App\Model\Entity\Entidad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntidadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Grupos'],
        ];
        $entidades = $this->paginate($this->Entidades);

        $this->set(compact('entidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Entidad id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entidad = $this->Entidades->get($id, [
            'contain' => ['Grupos', 'Etiquetas', 'Cosas'],
        ]);

        $this->set('entidad', $entidad);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entidad = $this->Entidades->newEntity();
        if ($this->request->is('post')) {
            $entidad = $this->Entidades->patchEntity($entidad, $this->request->getData());
            if ($this->Entidades->save($entidad)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $entidad->id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $grupos = $this->Entidades->Grupos->find('list', ['limit' => 200]);
        $etiquetas = $this->Entidades->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('entidad', 'grupos', 'etiquetas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Entidad id.
     * @return \Cake\Http\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entidad = $this->Entidades->get($id, [
            'contain' => ['Etiquetas'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entidad = $this->Entidades->patchEntity($entidad, $this->request->getData());
            if ($this->Entidades->save($entidad)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $grupos = $this->Entidades->Grupos->find('list', ['limit' => 200]);
        $etiquetas = $this->Entidades->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('entidad', 'grupos', 'etiquetas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entidad id.
     * @return \Cake\Http\Response Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entidad = $this->Entidades->get($id);
        if ($this->Entidades->delete($entidad)) {
            $this->Flash->success(__('Se ha eliminado!'));
        } else {
            $this->Flash->error(__('El registro no fue eliminado. Revise los errores e inténtelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
