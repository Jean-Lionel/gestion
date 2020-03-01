<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cotations Controller
 *
 * @property \App\Model\Table\CotationsTable $Cotations
 *
 * @method \App\Model\Entity\Cotation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CotationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employes'],
        ];
        $cotations = $this->paginate($this->Cotations);

        $this->set(compact('cotations'));
    }

    /**
     * View method
     *
     * @param string|null $id Cotation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cotation = $this->Cotations->get($id, [
            'contain' => ['Employes'],
        ]);

        $this->set('cotation', $cotation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cotation = $this->Cotations->newEntity();
        if ($this->request->is('post')) {
            $cotation = $this->Cotations->patchEntity($cotation, $this->request->getData());
            if ($this->Cotations->save($cotation)) {
                $this->Flash->success(__('The cotation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cotation could not be saved. Please, try again.'));
        }
        $employes = $this->Cotations->Employes->find('list', ['limit' => 200]);
        $this->set(compact('cotation', 'employes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cotation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cotation = $this->Cotations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cotation = $this->Cotations->patchEntity($cotation, $this->request->getData());
            if ($this->Cotations->save($cotation)) {
                $this->Flash->success(__('The cotation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cotation could not be saved. Please, try again.'));
        }
        $employes = $this->Cotations->Employes->find('list', ['limit' => 200]);
        $this->set(compact('cotation', 'employes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cotation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cotation = $this->Cotations->get($id);
        if ($this->Cotations->delete($cotation)) {
            $this->Flash->success(__('The cotation has been deleted.'));
        } else {
            $this->Flash->error(__('The cotation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
