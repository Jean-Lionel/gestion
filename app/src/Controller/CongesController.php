<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conges Controller
 *
 * @property \App\Model\Table\CongesTable $Conges
 *
 * @method \App\Model\Entity\Conge[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CongesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $conges = $this->paginate($this->Conges);

        $this->set(compact('conges'));
    }

    /**
     * View method
     *
     * @param string|null $id Conge id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conge = $this->Conges->get($id, [
            'contain' => [],
        ]);

        $this->set('conge', $conge);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conge = $this->Conges->newEntity();
        if ($this->request->is('post')) {
            $conge = $this->Conges->patchEntity($conge, $this->request->getData());
            if ($this->Conges->save($conge)) {
                $this->Flash->success(__('The conge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conge could not be saved. Please, try again.'));
        }
        $this->set(compact('conge'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conge id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conge = $this->Conges->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conge = $this->Conges->patchEntity($conge, $this->request->getData());
            if ($this->Conges->save($conge)) {
                $this->Flash->success(__('The conge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conge could not be saved. Please, try again.'));
        }
        $this->set(compact('conge'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conge id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conge = $this->Conges->get($id);
        if ($this->Conges->delete($conge)) {
            $this->Flash->success(__('The conge has been deleted.'));
        } else {
            $this->Flash->error(__('The conge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
