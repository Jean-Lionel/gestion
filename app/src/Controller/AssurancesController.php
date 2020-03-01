<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assurances Controller
 *
 * @property \App\Model\Table\AssurancesTable $Assurances
 *
 * @method \App\Model\Entity\Assurance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssurancesController extends AppController
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
        $assurances = $this->paginate($this->Assurances);

        $this->set(compact('assurances'));
    }

    /**
     * View method
     *
     * @param string|null $id Assurance id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assurance = $this->Assurances->get($id, [
            'contain' => ['Variables', 'Fonctions'],
        ]);

        $this->set('assurance', $assurance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assurance = $this->Assurances->newEntity();
        if ($this->request->is('post')) {
            $assurance = $this->Assurances->patchEntity($assurance, $this->request->getData());
            if ($this->Assurances->save($assurance)) {
                $this->Flash->success(__('The assurance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assurance could not be saved. Please, try again.'));
        }
        $variables = $this->Assurances->Variables->find('list', ['limit' => 200]);
       $fonctions = $this->Assurances->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('assurance', 'variables', 'fonctions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assurance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assurance = $this->Assurances->get($id, [
            'contain' => ['Fonctions'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assurance = $this->Assurances->patchEntity($assurance, $this->request->getData());
            if ($this->Assurances->save($assurance)) {
                $this->Flash->success(__('The assurance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assurance could not be saved. Please, try again.'));
        }
        $variables = $this->Assurances->Variables->find('list', ['limit' => 200]);
        $fonctions = $this->Assurances->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('assurance', 'variables', 'fonctions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assurance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assurance = $this->Assurances->get($id);
        if ($this->Assurances->delete($assurance)) {
            $this->Flash->success(__('The assurance has been deleted.'));
        } else {
            $this->Flash->error(__('The assurance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
