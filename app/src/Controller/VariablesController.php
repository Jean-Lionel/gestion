<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Variables Controller
 *
 * @property \App\Model\Table\VariablesTable $Variables
 *
 * @method \App\Model\Entity\Variable[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VariablesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $variables = $this->paginate($this->Variables);

        $this->set(compact('variables'));
    }

    /**
     * View method
     *
     * @param string|null $id Variable id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $variable = $this->Variables->get($id, [
            'contain' => [],
        ]);

        $this->set('variable', $variable);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $variable = $this->Variables->newEntity();
        if ($this->request->is('post')) {
            $variable = $this->Variables->patchEntity($variable, $this->request->getData());
            if ($this->Variables->save($variable)) {
                $this->Flash->success(__('The variable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The variable could not be saved. Please, try again.'));
        }
        $this->set(compact('variable'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Variable id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $variable = $this->Variables->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $variable = $this->Variables->patchEntity($variable, $this->request->getData());
            if ($this->Variables->save($variable)) {
                $this->Flash->success(__('The variable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The variable could not be saved. Please, try again.'));
        }
        $this->set(compact('variable'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Variable id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $variable = $this->Variables->get($id);
        if ($this->Variables->delete($variable)) {
            $this->Flash->success(__('The variable has been deleted.'));
        } else {
            $this->Flash->error(__('The variable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function search(){
       //$this->request->allowMethod('ajax');
        $this->layout = 'ajax';
        $keyWord = $this->request->query('keyWord');

        $query = $this->Variables->find('all',
            [
                'conditions' =>[
                    'name LIKE '=> '%'.$keyWord.'%',
                ]
            ]
    );
        $this->set('variables',$this->paginate($query));
        $this->set('_serialize',['variables']);
    }
}
