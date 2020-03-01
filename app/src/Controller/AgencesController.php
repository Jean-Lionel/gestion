<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Agences Controller
 *
 * @property \App\Model\Table\AgencesTable $Agences
 *
 * @method \App\Model\Entity\Agence[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgencesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $agences = $this->paginate($this->Agences);

        $this->set(compact('agences'));
    }

    /**
     * View method
     *
     * @param string|null $id Agence id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agence = $this->Agences->get($id, [
            'contain' => ['Employes'],
        ]);

        $this->set('agence', $agence);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agence = $this->Agences->newEntity();
        if ($this->request->is('post')) {
            $agence = $this->Agences->patchEntity($agence, $this->request->getData());
            if ($this->Agences->save($agence)) {
                $this->Flash->success(__('The agence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agence could not be saved. Please, try again.'));
        }
        $this->set(compact('agence'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agence id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agence = $this->Agences->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agence = $this->Agences->patchEntity($agence, $this->request->getData());
            if ($this->Agences->save($agence)) {
                $this->Flash->success(__('The agence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agence could not be saved. Please, try again.'));
        }
        $this->set(compact('agence'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agence id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agence = $this->Agences->get($id);
        if ($this->Agences->delete($agence)) {
            $this->Flash->success(__('The agence has been deleted.'));
        } else {
            $this->Flash->error(__('The agence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
