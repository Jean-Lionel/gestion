<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fonctions Controller
 *
 * @property \App\Model\Table\FonctionsTable $Fonctions
 *
 * @method \App\Model\Entity\Fonction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FonctionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 5
        ];


        $fonctions = $this->paginate($this->Fonctions);

        $this->set(compact('fonctions'));
    }

    /**
     * View method
     *
     * @param string|null $id Fonction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fonction = $this->Fonctions->get($id, [
            'contain' => ['Assurances', 'Indeminites', 'Employes'],
        ]);

        $this->set('fonction', $fonction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fonction = $this->Fonctions->newEntity();
        if ($this->request->is('post')) {
            $fonction = $this->Fonctions->patchEntity($fonction, $this->request->getData());
            if ($this->Fonctions->save($fonction)) {
                $this->Flash->success(__('The fonction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fonction could not be saved. Please, try again.'));
        }
        $assurances = $this->Fonctions->Assurances->find('list', ['limit' => 200]);
        $indeminites = $this->Fonctions->Indeminites->find('list', ['limit' => 200]);
        $this->set(compact('fonction', 'assurances', 'indeminites'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fonction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fonction = $this->Fonctions->get($id, [
            'contain' => ['Assurances', 'Indeminites'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fonction = $this->Fonctions->patchEntity($fonction, $this->request->getData());
            if ($this->Fonctions->save($fonction)) {
                $this->Flash->success(__('The fonction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fonction could not be saved. Please, try again.'));
        }
        $assurances = $this->Fonctions->Assurances->find('list', ['limit' => 200]);
        $indeminites = $this->Fonctions->Indeminites->find('list', ['limit' => 200]);
        $this->set(compact('fonction', 'assurances', 'indeminites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fonction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fonction = $this->Fonctions->get($id);
        if ($this->Fonctions->delete($fonction)) {
            $this->Flash->success(__('The fonction has been deleted.'));
        } else {
            $this->Flash->error(__('The fonction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
