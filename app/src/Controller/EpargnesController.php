<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Epargnes Controller
 *
 * @property \App\Model\Table\EpargnesTable $Epargnes
 *
 * @method \App\Model\Entity\Epargne[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpargnesController extends AppController
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
        $this->paginate = [
            'contain' => ['Variables'],
        ];
        $epargnes = $this->paginate($this->Epargnes,
            [
                'order' =>["Epargnes.periode DESC"] 
            ]);

        $this->set(compact('epargnes'));
    }

    /**
     * View method
     *
     * @param string|null $id Epargne id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $epargne = $this->Epargnes->get($id, [
            'contain' => ['Variables'],
        ]);

        $this->set('epargne', $epargne);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $epargne = $this->Epargnes->newEntity();
        if ($this->request->is('post')) {
            $epargne = $this->Epargnes->patchEntity($epargne, $this->request->getData());
            $employe = $this->Employes->find('all', ['conditions' => ['matricule' => $epargne->matricule]])->first();

            if ($employe != null) {
                if ($this->Epargnes->save($epargne)) {
                    $this->Flash->success(__('Opération réussi'));

                    return $this->redirect(['action' => 'index']);
                }

            }

            $this->Flash->error(__('Vérifier le numéro matricule'));
        }
        $variables = $this->Epargnes->Variables->find('list', [
            'order'=>['name'],
            'limit' => 200]);
        $this->set(compact('epargne', 'variables'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Epargne id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $epargne = $this->Epargnes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $epargne = $this->Epargnes->patchEntity($epargne, $this->request->getData());
            $employe = $this->Employes->find('all', ['conditions' => ['matricule' => $epargne->matricule]])->first();

            if ($employe != null) {
                if ($this->Epargnes->save($epargne)) {
                    $this->Flash->success(__('Opération réussi'));

                    return $this->redirect(['action' => 'index']);
                }

            }

            $this->Flash->error(__('Vérifier le numéro matricule'));

        }
        $variables = $this->Epargnes->Variables->find('list', [
            'limit' => 200]);
        $this->set(compact('epargne', 'variables'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Epargne id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $epargne = $this->Epargnes->get($id);
        if ($this->Epargnes->delete($epargne)) {
            $this->Flash->success(__('The epargne has been deleted.'));
        } else {
            $this->Flash->error(__('The epargne could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function search()
    {
       $keyWord = $this->request->query('searchKey');

       $q = $this->Epargnes->find('all',[
        'conditions' => [
            'Epargnes.matricule' =>  $keyWord 
        ],
        'oder' =>
            'Epargnes.periode DESC'
        
       ]);

       $this->set('epargnes',$this->paginate($q));
       $this->set('_serialize',['epargnes']);
    }
}
