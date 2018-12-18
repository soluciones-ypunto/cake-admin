<?php
namespace Ypunto\Admin\Controller;

use Cake\Http\Exception\NotFoundException;

/**
 * Entidades Controller
 *
 * @property \Ypunto\Admin\Model\Table\EntidadesTable $Entidades
 *
 * @method \Ypunto\Admin\Model\Entity\Entidad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntidadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     * @throws \Aura\Intl\Exception
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Grupos']
        ];
        try {
            $entidades = $this->paginate($this->Entidades);
        } catch (NotFoundException $exception) {
            $this->Flash->error(__('No se encontró la página solicitada.'));
            return $this->redirect(['?' => []]);
        }

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
            'contain' => ['Grupos', 'Etiquetas', 'Cosas', 'History']
        ]);

        $this->set('entidad', $entidad);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entidad = $this->Entidades->newEntity();
        if ($this->request->is('post')) {
            $entidad = $this->Entidades->patchEntity($entidad, $this->request->getData());
            if ($this->Entidades->save($entidad)) {
                $this->Flash->success(__('The entidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entidad could not be saved. Please, try again.'));
        }
        $grupos = $this->Entidades->Grupos->find('list', ['limit' => 200]);
        $etiquetas = $this->Entidades->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('entidad', 'grupos', 'etiquetas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Entidad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entidad = $this->Entidades->get($id, [
            'contain' => ['Etiquetas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entidad = $this->Entidades->patchEntity($entidad, $this->request->getData());
            if ($this->Entidades->save($entidad)) {
                $this->Flash->success(__('The entidad has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The entidad could not be saved. Please, try again.'));
        }
        $grupos = $this->Entidades->Grupos->find('list', ['limit' => 200]);
        $etiquetas = $this->Entidades->Etiquetas->find('list', ['limit' => 200]);
        $this->set(compact('entidad', 'grupos', 'etiquetas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entidad id.
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Aura\Intl\Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entidad = $this->Entidades->get($id);
        if ($this->Entidades->delete($entidad)) {
            $this->Flash->success(__('The entidad has been deleted.'));
        } else {
            $this->Flash->error(__('The entidad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
