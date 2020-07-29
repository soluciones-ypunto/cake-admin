<?php
namespace DemoPlugin\Controller\TestPrefix;

use DemoPlugin\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\Utility\Hash;
use Psr\Http\Message\ResponseInterface;
use Ypunto\Admin\Controller\Utility\PrgTrait;

/**
 * Entidades Controller
 *
 *
 * @method \DemoPlugin\Model\Entity\Entidad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntidadesController extends AppController
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

        $entidades = $this->Entidades
            ->find();

        if ($search = $this->request->getQuery('search')) {
            $entidades->where(function (QueryExpression $exp) use ($search) {
                return $exp->like('Entidades.id', "%{$search}%");
            });
        }

        $entidades = $this->paginate($entidades);

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
            'contain' => [],
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
                $this->Flash->success(__('Guardado correctamente!'));

                $destination = ['action' => 'view', $entidad->id];
                if ($this->request->getData('_nextAction') === 'add') {
                    $destination = $this->request->getRequestTarget();
                }

                return $this->redirect($destination);
            }

            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }



        $this->set(compact('entidad'));
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
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $entidad = $this->Entidades->patchEntity($entidad, $this->request->getData());

            if ($this->Entidades->save($entidad)) {
                $this->Flash->success(__('Guardado correctamente!'));

                return $this->redirect(['action' => 'view', $id]);
            }

            $this->Flash->error(__('No se pudo guardar. Revise los errores e inténtelo nuevamente.'));
        }


        $this->set(compact('entidad'));
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
