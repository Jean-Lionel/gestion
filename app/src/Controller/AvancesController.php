<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Avances Controller
 *
 * @property \App\Model\Table\AvancesTable $Avances
 *
 * @method \App\Model\Entity\Avance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AvancesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Variables'],
        ];
        $avances = $this->paginate($this->Avances);

        $this->set(compact('avances'));
    }

    /**
     * View method
     *
     * @param string|null $id Avance id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $avance = $this->Avances->get($id, [
            'contain' => ['Variables'],
        ]);

        $this->set('avance', $avance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $avance = $this->Avances->newEntity();
        if ($this->request->is('post')) {
            $avance = $this->Avances->patchEntity($avance, $this->request->getData());
            if ($this->Avances->save($avance)) {
                $this->Flash->success(__('The avance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The avance could not be saved. Please, try again.'));
        }
        $variables = $this->Avances->Variables->find('list', ['limit' => 200]);
        $this->set(compact('avance', 'variables'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Avance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $avance = $this->Avances->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $avance = $this->Avances->patchEntity($avance, $this->request->getData());
            if ($this->Avances->save($avance)) {
                $this->Flash->success(__('The avance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The avance could not be saved. Please, try again.'));
        }
        $variables = $this->Avances->Variables->find('list', ['limit' => 200]);
        $this->set(compact('avance', 'variables'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Avance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $avance = $this->Avances->get($id);
        if ($this->Avances->delete($avance)) {
            $this->Flash->success(__('The avance has been deleted.'));
        } else {
            $this->Flash->error(__('The avance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
