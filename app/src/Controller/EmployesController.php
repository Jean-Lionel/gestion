<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employes Controller
 *
 * @property \App\Model\Table\EmployesTable $Employes
 *
 * @method \App\Model\Entity\Employe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $keyWord = $this->request->query('keyWord');
        $champ = $this->request->query('champ');

        if(!empty($keyWord)){
            if( $champ == 'matricule'){
              $keyWord = intVal($keyWord);

                $this->paginate = [
                    'conditions' => ['matricule' => $keyWord],
                ];
            }else{

                $this->paginate = [
                    'conditions' => [$champ.' LIKE ' => '%'.$keyWord.'%'],

                ];
            }

            }

        //$this->paginate = [
          //  'contain' => ['Levels', 'Agences', 'Fonctions', 'Services', 'Categories', 'Banques'],
        //];
            $employes = $this->paginate($this->Employes);

            $this->set(compact('employes'));
        }

    /**
     * View method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employe = $this->Employes->get($id, [
            'contain' => ['Levels', 'Agences', 'Fonctions', 'Services', 'Categories', 'Banques', 'Cotations'],
        ]);

        $this->set('employe', $employe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employe = $this->Employes->newEntity();
        if ($this->request->is('post')) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $levels = $this->Employes->Levels->find('list', ['limit' => 200]);
        $agences = $this->Employes->Agences->find('list', ['limit' => 200]);
        $fonctions = $this->Employes->Fonctions->find('list', ['limit' => 200]);
        $services = $this->Employes->Services->find('list', ['limit' => 200]);
        $categories = $this->Employes->Categories->find('list', ['limit' => 200]);
        $banques = $this->Employes->Banques->find('list', ['limit' => 200]);
        //Recuperation du dernier matricule
        $lastEmployes = $this->Employes->find()->last(); 
        $matricule = $lastEmployes->matricule + 1;
        
        $this->set(compact('employe', 'levels', 'agences', 'fonctions', 'services', 'categories', 'banques','matricule'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employe = $this->Employes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $levels = $this->Employes->Levels->find('list', ['limit' => 200]);
        $agences = $this->Employes->Agences->find('list', ['limit' => 200]);
        $fonctions = $this->Employes->Fonctions->find('list', ['limit' => 200]);
        $services = $this->Employes->Services->find('list', ['limit' => 200]);
        $categories = $this->Employes->Categories->find('list', ['limit' => 200]);
        $banques = $this->Employes->Banques->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'levels', 'agences', 'fonctions', 'services', 'categories', 'banques'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employe = $this->Employes->get($id);
        if ($this->Employes->delete($employe)) {
            $this->Flash->success(__('The employe has been deleted.'));
        } else {
            $this->Flash->error(__('The employe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function desable($id = null)
    {
        $this->request->allowMethod(['post', 'desable']);
        $employe = $this->Employes->get($id);
        //$employe->etat = 0;

        if($employe->etat == 0){
            $employe->etat = 1;
        }else{
            $employe->etat = 0; 
        }

        if ($this->Employes->save($employe)) {
            $this->Flash->success(__('employe a été désactive'));
        } else {
            $this->Flash->error(__('The employe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function bullettin(){

      $employes = $this->paginate($this->Employes,[

        'conditions' => ['etat'=>1]
      ]);


      $this->set(compact('employes'));

    }
}
