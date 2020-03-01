<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Indeminites Controller
 *
 * @property \App\Model\Table\IndeminitesTable $Indeminites
 *
 * @method \App\Model\Entity\Indeminite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndeminitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $indeminites = $this->paginate($this->Indeminites);

        $this->set(compact('indeminites'));
    }

    /**
     * View method
     *
     * @param string|null $id Indeminite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $indeminite = $this->Indeminites->get($id, [
            'contain' => ['Fonctions', 'Ajustements'],
        ]);

        $this->set('indeminite', $indeminite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $indeminite = $this->Indeminites->newEntity();
        if ($this->request->is('post')) {
            $indeminite = $this->Indeminites->patchEntity($indeminite, $this->request->getData());
            if ($this->Indeminites->save($indeminite)) {
                $this->Flash->success(__('The indeminite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The indeminite could not be saved. Please, try again.'));
        }
        $fonctions = $this->Indeminites->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('indeminite', 'fonctions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Indeminite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $indeminite = $this->Indeminites->get($id, [
            'contain' => ['Fonctions'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $indeminite = $this->Indeminites->patchEntity($indeminite, $this->request->getData());
            if ($this->Indeminites->save($indeminite)) {
                $this->Flash->success(__('The indeminite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The indeminite could not be saved. Please, try again.'));
        }
        $fonctions = $this->Indeminites->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('indeminite', 'fonctions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Indeminite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $indeminite = $this->Indeminites->get($id);
        if ($this->Indeminites->delete($indeminite)) {
            $this->Flash->success(__('The indeminite has been deleted.'));
        } else {
            $this->Flash->error(__('The indeminite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
