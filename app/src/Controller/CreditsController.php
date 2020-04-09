<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Credits Controller
 *
 * @property \App\Model\Table\CreditsTable $Credits
 *
 * @method \App\Model\Entity\Credit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CreditsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function initialize(){
        parent::initialize();
        $this->loadModel('Employes');
        $this->loadComponent('Myfonction');
    }
    public function index()
    {

        $this->paginate = [
            'contain' => ['Variables'],
        ];
        $credits = $this->paginate($this->Credits, ['order' => ['date_credit' => 'DESC']]);

        $this->set(compact('credits'));
    }

    /**
     * View method
     *
     * @param string|null $id Credit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $credit = $this->Credits->get($id, [
            'contain' => ['Variables'],
        ]);

        $this->set('credit', $credit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $credit = $this->Credits->newEntity();

        if ($this->request->is('post')) {
            $credit = $this->Credits->patchEntity($credit, $this->request->getData());

            $employe = $this->Employes->find('all',['conditions'=>['matricule' => $credit->matricule]])->first();
            if($employe != null){

                //calculer du paiement credit 

                $montant_Moi = $credit->montant / $credit->periode_paiement;

                $date_credit = (array)$credit->date_credit;
                $date_fin = $this->Myfonction->add_date($date_credit['date'],$credit->periode_paiement);
                
                $credit->montant_Moi = round($montant_Moi);
                $credit->date_fin = $date_fin;
                $credit->periode = $credit->date_credit;

               
                if ($this->Credits->save($credit)) {
                    $this->Flash->success(__('Opération réussi.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Erreur réessayer encore'));

            }else{

                $this->Flash->error(__('Vérifier le numéro matricule'));
            }

            
        }
        $variables = $this->Credits->Variables->find('list', ['limit' => 200]);
        $this->set(compact('credit', 'variables'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $credit = $this->Credits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
           
             $credit = $this->Credits->patchEntity($credit, $this->request->getData());

            $employe = $this->Employes->find('all',['conditions'=>['matricule' => $credit->matricule]])->first();
            if($employe != null){

                $montant_Moi = $credit->montant / $credit->periode_paiement;

                $date_credit = (array)$credit->date_credit;
                $date_fin = $this->Myfonction->add_date($date_credit['date'],$credit->periode_paiement);
                
                $credit->montant_Moi = round($montant_Moi);
                $credit->date_fin = $date_fin;
                $credit->periode = $credit->date_credit;

               
                if ($this->Credits->save($credit)) {
                    $this->Flash->success(__('Opération réussi.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Erreur réessayer encore'));

            }else{

                $this->Flash->error(__('Vérifier le numéro matricule'));
            }
        }
        $variables = $this->Credits->Variables->find('list', ['limit' => 200]);
        $this->set(compact('credit', 'variables'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $credit = $this->Credits->get($id);
        if ($this->Credits->delete($credit)) {
            $this->Flash->success(__('The credit has been deleted.'));
        } else {
            $this->Flash->error(__('The credit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function search(){
        $this->layout = 'ajax';
        $keyWord = $this->request->query('keyWord');
        $query = $this->Credits->find('all',[
            'conditions' => ['matricule' => $keyWord]
        ]);

        $this->set('credits',$this->paginate($query));
        $this->set('_serialize',['credits']);
    }
}
