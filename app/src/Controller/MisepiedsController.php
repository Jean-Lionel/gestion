<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Misepieds Controller
 *
 * @property \App\Model\Table\MisepiedsTable $Misepieds
 *
 * @method \App\Model\Entity\Misepied[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MisepiedsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Employes');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $misepieds = $this->paginate($this->Misepieds);

        $this->set(compact('misepieds'));
    }

    /**
     * View method
     *
     * @param string|null $id Misepied id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $misepied = $this->Misepieds->get($id, [
            'contain' => [],
        ]);

        $this->set('misepied', $misepied);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $misepied = $this->Misepieds->newEntity();
        if ($this->request->is('post')) {
            $misepied = $this->Misepieds->patchEntity($misepied, $this->request->getData());

            $employe = $this->Employes->find('all', ['conditions' => ['matricule' => $misepied->matricule]])->first();

            if ($employe) {
                if ($this->Misepieds->save($misepied)) {
                    $this->Flash->success(__('Opération réussi'));

                    return $this->redirect(['action' => 'index']);
                }

            }

            $this->Flash->error(__('Vérifier le nnuméro matricule et réessayer encore'));
        }
        $this->set(compact('misepied'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Misepied id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $misepied = $this->Misepieds->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $misepied = $this->Misepieds->patchEntity($misepied, $this->request->getData());

            $employe = $this->Employes->find('all', ['conditions' => ['matricule' => $misepied->matricule]])->first();

            if ($employe != NULL) {
                if ($this->Misepieds->save($misepied)) {
                    $this->Flash->success(__('Opération réussi'));

                    return $this->redirect(['action' => 'index']);
                }

            }

            $this->Flash->error(__('Vérifier le nnuméro matricule et réessayer encore'));

        }
        $this->set(compact('misepied'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Misepied id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $misepied = $this->Misepieds->get($id);
        if ($this->Misepieds->delete($misepied)) {
            $this->Flash->success(__('The misepied has been deleted.'));
        } else {
            $this->Flash->error(__('The misepied could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
