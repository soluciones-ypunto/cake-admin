<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grupos Controller
 *
 * @property \App\Model\Table\GruposTable $Grupos
 *
 * @method \App\Model\Entity\Grupo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GruposController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $grupos = $this->paginate($this->Grupos);

        $this->set(compact('grupos'));
    }

    /**
     * View method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grupo = $this->Grupos->get($id, [
            'contain' => ['Entidades'],
        ]);

        $this->set('grupo', $grupo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grupo = $this->Grupos->newEntity();
        if ($this->request->is('post')) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->getData());
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $grupo->id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $this->set(compact('grupo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grupo = $this->Grupos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->getData());
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $this->set(compact('grupo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grupo = $this->Grupos->get($id);
        if ($this->Grupos->delete($grupo)) {
            $this->Flash->success(__('Se ha eliminado!'));
        } else {
            $this->Flash->error(__('El registro no fue eliminado. Revise los errores e inténtelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
