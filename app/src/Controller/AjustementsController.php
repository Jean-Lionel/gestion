<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ajustements Controller
 *
 * @property \App\Model\Table\AjustementsTable $Ajustements
 *
 * @method \App\Model\Entity\Ajustement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AjustementsController extends AppController
{
    

    /**
     * Index method
     * public $paginate = [ 
    *'limit' => 25, 
    *'order' => [ 'Articles.title' => 'asc' ] ];
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ancienetes', 'Categories'],
            'limit' => 6
        ];
        $ajustements = $this->paginate($this->Ajustements);


        $this->set(compact('ajustements'));
    }

    /**
     * View method
     *
     * @param string|null $id Ajustement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ajustement = $this->Ajustements->get($id, [
            'contain' => ['Ancienetes', 'Categories'],
        ]);

        $this->set('ajustement', $ajustement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ajustement = $this->Ajustements->newEntity();
        if ($this->request->is('post')) {
            $ajustement = $this->Ajustements->patchEntity($ajustement, $this->request->getData());
            if ($this->Ajustements->save($ajustement)) {
                $this->Flash->success(__('The ajustement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ajustement could not be saved. Please, try again.'));
        }
        $ancienetes = $this->Ajustements->Ancienetes->find('list', ['limit' => 200]);
        $categories = $this->Ajustements->Categories->find('list', ['limit' => 200]);
       // $indeminites = $this->Ajustements->Indeminites->find('list', ['limit' => 200]);
        $this->set(compact('ajustement', 'ancienetes', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ajustement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ajustement = $this->Ajustements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ajustement = $this->Ajustements->patchEntity($ajustement, $this->request->getData());
            if ($this->Ajustements->save($ajustement)) {
                $this->Flash->success(__('The ajustement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ajustement could not be saved. Please, try again.'));
        }
        $ancienetes = $this->Ajustements->Ancienetes->find('list', ['limit' => 200]);
        $categories = $this->Ajustements->Categories->find('list', ['limit' => 200]);
       // $indeminites = $this->Ajustements->Indeminites->find('list', ['limit' => 200]);
        $this->set(compact('ajustement', 'ancienetes', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ajustement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ajustement = $this->Ajustements->get($id);
        if ($this->Ajustements->delete($ajustement)) {
            $this->Flash->success(__('The ajustement has been deleted.'));
        } else {
            $this->Flash->error(__('The ajustement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
