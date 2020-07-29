<?php
namespace DemoPlugin\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\Utility\Hash;
use Psr\Http\Message\ResponseInterface;
use Ypunto\Admin\Controller\Utility\PrgTrait;

/**
 * Cosas Controller
 *
 *
 * @method \DemoPlugin\Model\Entity\Cosa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CosasController extends AppController
{
    use PrgTrait;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        /** @var \Cake\Http\Response $response */
        $response = $this->applyPrg($this->request, $this->response);
        if ($response instanceof ResponseInterface) {
            return $response;
        }

        $cosas = $this->Cosas
            ->find();

        if ($search = $this->request->getQuery('search')) {
            $cosas->where(function (QueryExpression $exp) use ($search) {
                return $exp->like('Cosas.id', "%{$search}%");
            });
        }

        $cosas = $this->paginate($cosas);

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
            'contain' => [],
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
                $this->Flash->success(__('Guardado correctamente!'));

                $destination = ['action' => 'view', $cosa->id];
                if ($this->request->getData('_nextAction') === 'add') {
                    $destination = $this->request->getRequestTarget();
                }

                return $this->redirect($destination);
            }

            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }



        $this->set(compact('cosa'));
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
                $this->Flash->success(__('Guardado correctamente!'));

                return $this->redirect(['action' => 'view', $id]);
            }

            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }


        $this->set(compact('cosa'));
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
