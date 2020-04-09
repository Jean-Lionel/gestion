<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
        $assurances = $this->paginate($this->Assurances,
            ['order' => ['periode' => 'DESC'] ]);

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



    public function reporter(){
        $connection = ConnectionManager::get('default');
        $temps = $this->request->getData();

        $current_time = $temps['temp_actuel']['year'].'-'.$temps['temp_actuel']['month'].'-'.$temps['temp_actuel']['day'];

        $old_time = $temps['temp_passe']['year'].'-'.$temps['temp_passe']['month'].'-'.$temps['temp_passe']['day'];
        $year = $temps['temp_actuel']['year'] ;
        $month = $temps['temp_actuel']['month'];

        $current_data = 
        $connection->execute(
            "SELECT IF(COUNT(*) < 1 , 1,0) as result FROM assurances WHERE YEAR(periode) = '".$year."' AND MONTH(periode) = '".$month."'")->fetchAll('assoc');


        if($current_data[0]['result'] == '1'){

            if($current_time > $old_time) {

                $results = $connection->execute(
                    '
                SELECT * FROM assurances WHERE YEAR(periode)=' .
                 $temps['temp_passe']['year'] . ' AND MONTH(periode)=' . 
                 $temps['temp_passe']['month'])->fetchAll('assoc');



                foreach ($results as $key => $value) {
                    // INSERT INTO assurances (variable_id, matricule, montant, periode, created, modified) VALUES (:c0, :c1, :c2, :c3, :c4, :c5)
                     
               
                    $assurance = $this->Assurances->newEntity();

                    $assurance->matricule = $value['matricule'];
                    $assurance->montant = $value['montant'];
                    $assurance->periode = $current_time;
                    $assurance->variable_id = $value['variable_id'];

                    // debug($assurance);
                    // die();


                    if (!$this->Assurances->save($assurance)) {

                        $this->Flash->error(__('Opération n\'as pas été effectuée réessayer encore ou demander l\'aide'));
                        return $this->redirect(['action' => 'add']);

                    }
                    // $this->Epargnes->save($assurance)

                }
                $this->Flash->success(__('Opération réussi'));
            }else{
                return $this->redirect(['action' => 'add']);

            }


        }else{
            $this->Flash->error(__("Opération impossible car vous l' avez déjà effectuée "));
        }

        return $this->redirect(['action' => 'index']);

    }

    public function search(){
        $this->layout = 'ajax';

        $keyWord = $this->request->query('searchKey');

        $q =  $this->Assurances->find('all');


        if($keyWord){
            $q = $this->Assurances->find('all',[
                'conditions' => [
                    'Assurances.matricule' =>  $keyWord
                ],
                'oder' =>
                    'Assurances.periode DESC'

            ]);

        }


        $this->set('assurances',$this->paginate($q));
        $this->set('_serialize',['assurances']);
    }
}
