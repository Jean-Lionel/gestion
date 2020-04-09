<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Banques Controller
 *
 * @property \App\Model\Table\BanquesTable $Banques
 *
 * @method \App\Model\Entity\Banque[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BanquesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $banques = $this->paginate($this->Banques);

        $this->set(compact('banques'));
    }

    /**
     * View method
     *
     * @param string|null $id Banque id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $banque = $this->Banques->get($id, [
           // 'contain' => ['Assurances', 'Avances', 'Employes', 'Epargnes'],
        ]);

        $this->set('banque', $banque);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $banque = $this->Banques->newEntity();
        if ($this->request->is('post')) {
            $banque = $this->Banques->patchEntity($banque, $this->request->getData());
            if ($this->Banques->save($banque)) {
                $this->Flash->success(__('The banque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banque could not be saved. Please, try again.'));
        }
        $this->set(compact('banque'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banque id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $banque = $this->Banques->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banque = $this->Banques->patchEntity($banque, $this->request->getData());
            if ($this->Banques->save($banque)) {
                $this->Flash->success(__('The banque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banque could not be saved. Please, try again.'));
        }
        $this->set(compact('banque'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Banque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banque = $this->Banques->get($id);
        if ($this->Banques->delete($banque)) {
            $this->Flash->success(__('The banque has been deleted.'));
        } else {
            $this->Flash->error(__('The banque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function search(){
        //$this->request->allowMethod('ajax');
        $this->layout = 'ajax';

        $keyWord = $this->request->query('keyWord');

        $query = $this->Banques->find('all',[
            'conditions' => ['name LIKE ' => '%'.$keyWord.'%'],
            'order' => ['Banques.id'=>'ASC']
        ]);

        $this->set('banques',$this->paginate($query));
        $this->set('_serialize',['banques']);



    }
}
