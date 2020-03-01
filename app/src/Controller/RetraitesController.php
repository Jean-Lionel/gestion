<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Retraites Controller
 *
 * @property \App\Model\Table\RetraitesTable $Retraites
 *
 * @method \App\Model\Entity\Retraite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RetraitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $retraites = $this->paginate($this->Retraites);

        $this->set(compact('retraites'));
    }

    /**
     * View method
     *
     * @param string|null $id Retraite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $retraite = $this->Retraites->get($id, [
            'contain' => [],
        ]);

        $this->set('retraite', $retraite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $retraite = $this->Retraites->newEntity();
        if ($this->request->is('post')) {
            $retraite = $this->Retraites->patchEntity($retraite, $this->request->getData());
            if ($this->Retraites->save($retraite)) {
                $this->Flash->success(__('The retraite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retraite could not be saved. Please, try again.'));
        }
        $this->set(compact('retraite'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Retraite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $retraite = $this->Retraites->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $retraite = $this->Retraites->patchEntity($retraite, $this->request->getData());
            if ($this->Retraites->save($retraite)) {
                $this->Flash->success(__('The retraite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The retraite could not be saved. Please, try again.'));
        }
        $this->set(compact('retraite'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Retraite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $retraite = $this->Retraites->get($id);
        if ($this->Retraites->delete($retraite)) {
            $this->Flash->success(__('The retraite has been deleted.'));
        } else {
            $this->Flash->error(__('The retraite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
