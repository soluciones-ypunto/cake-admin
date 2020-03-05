<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cosas Controller
 *
 * @property \App\Model\Table\CosasTable $Cosas
 *
 * @method \App\Model\Entity\Cosa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CosasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Entidades'],
        ];
        $cosas = $this->paginate($this->Cosas);

        $this->set(compact('cosas'));
    }

    /**
     * View method
     *
     * @param string|null $id Cosa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cosa = $this->Cosas->get($id, [
            'contain' => ['Entidades'],
        ]);

        $this->set('cosa', $cosa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cosa = $this->Cosas->newEntity();
        if ($this->request->is('post')) {
            $cosa = $this->Cosas->patchEntity($cosa, $this->request->getData());
            if ($this->Cosas->save($cosa)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $cosa->id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $entidades = $this->Cosas->Entidades->find('list', ['limit' => 200]);
        $this->set(compact('cosa', 'entidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cosa id.
     * @return \Cake\Http\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cosa = $this->Cosas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cosa = $this->Cosas->patchEntity($cosa, $this->request->getData());
            if ($this->Cosas->save($cosa)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $entidades = $this->Cosas->Entidades->find('list', ['limit' => 200]);
        $this->set(compact('cosa', 'entidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cosa id.
     * @return \Cake\Http\Response Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cosa = $this->Cosas->get($id);
        if ($this->Cosas->delete($cosa)) {
            $this->Flash->success(__('Se ha eliminado!'));
        } else {
            $this->Flash->error(__('El registro no fue eliminado. Revise los errores e inténtelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
