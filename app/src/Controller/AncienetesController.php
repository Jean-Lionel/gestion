<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ancienetes Controller
 *
 * @property \App\Model\Table\AncienetesTable $Ancienetes
 *
 * @method \App\Model\Entity\Ancienete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AncienetesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ancienetes = $this->paginate($this->Ancienetes);

        $this->set(compact('ancienetes'));
    }

    /**
     * View method
     *
     * @param string|null $id Ancienete id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ancienete = $this->Ancienetes->get($id, [
            'contain' => ['Ajustements'],
        ]);

        $this->set('ancienete', $ancienete);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ancienete = $this->Ancienetes->newEntity();
        if ($this->request->is('post')) {
            $ancienete = $this->Ancienetes->patchEntity($ancienete, $this->request->getData());
            if ($this->Ancienetes->save($ancienete)) {
                $this->Flash->success(__('The ancienete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ancienete could not be saved. Please, try again.'));
        }
        $this->set(compact('ancienete'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ancienete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ancienete = $this->Ancienetes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ancienete = $this->Ancienetes->patchEntity($ancienete, $this->request->getData());
            if ($this->Ancienetes->save($ancienete)) {
                $this->Flash->success(__('The ancienete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ancienete could not be saved. Please, try again.'));
        }
        $this->set(compact('ancienete'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ancienete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ancienete = $this->Ancienetes->get($id);
        if ($this->Ancienetes->delete($ancienete)) {
            $this->Flash->success(__('The ancienete has been deleted.'));
        } else {
            $this->Flash->error(__('The ancienete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
