<?php
namespace Ypunto\Admin\Controller;

use Ypunto\Admin\Controller\AppController;

/**
 * Etiquetas Controller
 *
 * @property \Ypunto\Admin\Model\Table\EtiquetasTable $Etiquetas
 *
 * @method \Ypunto\Admin\Model\Entity\Etiqueta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EtiquetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $etiquetas = $this->paginate($this->Etiquetas);

        $this->set(compact('etiquetas'));
    }

    /**
     * View method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etiqueta = $this->Etiquetas->get($id, [
            'contain' => ['Entidades']
        ]);

        $this->set('etiqueta', $etiqueta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etiqueta = $this->Etiquetas->newEntity();
        if ($this->request->is('post')) {
            $etiqueta = $this->Etiquetas->patchEntity($etiqueta, $this->request->getData());
            if ($this->Etiquetas->save($etiqueta)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $etiqueta->id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $entidades = $this->Etiquetas->Entidades->find('list', ['limit' => 200]);
        $this->set(compact('etiqueta', 'entidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etiqueta = $this->Etiquetas->get($id, [
            'contain' => ['Entidades']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etiqueta = $this->Etiquetas->patchEntity($etiqueta, $this->request->getData());
            if ($this->Etiquetas->save($etiqueta)) {
                $this->Flash->success(__('Se ha guardado!'));

                if ($this->request->getData('_nextAction') === 'add') {
                    return $this->redirect(['action' => 'add']);
                }

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }
        $entidades = $this->Etiquetas->Entidades->find('list', ['limit' => 200]);
        $this->set(compact('etiqueta', 'entidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Etiqueta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etiqueta = $this->Etiquetas->get($id);
        if ($this->Etiquetas->delete($etiqueta)) {
            $this->Flash->success(__('Se ha eliminado!'));
        } else {
            $this->Flash->error(__('El registro no fue eliminado. Revise los errores e inténtelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
