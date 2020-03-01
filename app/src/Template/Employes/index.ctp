<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe[]|\Cake\Collection\CollectionInterface $employes
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agences'), ['controller' => 'Agences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agence'), ['controller' => 'Agences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Banques'), ['controller' => 'Banques', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Banque'), ['controller' => 'Banques', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cotations'), ['controller' => 'Cotations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotation'), ['controller' => 'Cotations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employes index large-10 medium-10 columns content">
    <h3><?= __('Employes') ?></h3>
    <?= $this->Form->create("",['type'=>'get']); ?>
    <div class="row">
         <div class="medium-2 columns">
             <?= $this->Form->control("champ",[
                'options'=>[
                    'matricule' => 'matricule',
                    'nom' => 'nom'
                    ,'prenom' => 'prénom'
                ],
                'label'=> false,
                'default'=>$this->request->query('champ') 
            ]); ?>

        </div>
        <div class="medium-3 columns">
            <?= $this->Form->control("keyWord",['label'=>false,'default'=>$this->request->query('keyWord')]); ?>
        </div>
        <div class="medium-2 columns">
            <!-- <button>Rechercher</button> -->
        </div>
    </div>
    <?= $this->Form->end(); ?>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateNaissance','Date de naissance') ?></th>
              <!--  
                <th scope="col"><?= $this->Paginator->sort('sexe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('etatCivil') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('base_salary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conjointFonction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombreEnfant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salaireBase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('agence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fonction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('banque_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('compte') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateEmbauche') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('etat') ?></th>
                !-->
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $key => $employe): ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $this->Number->format($employe->matricule) ?></td>
                <td><?= h($employe->nom) ?></td>
                <td><?= h($employe->prenom) ?></td>
                <td><?= h($employe->dateNaissance) ?></td>
               <!-- 
                <td><?= h($employe->sexe) ?></td>
                <td><?= h($employe->etatCivil) ?></td>
                <td><?= $employe->has('level') ? $this->Html->link($employe->level->name, ['controller' => 'Levels', 'action' => 'view', $employe->level->id]) : '' ?></td>
                <td><?= $this->Number->format($employe->base_salary) ?></td>
                <td><?= $this->Number->format($employe->conjointFonction) ?></td>
                <td><?= h($employe->telephone) ?></td>
                <td><?= h($employe->email) ?></td>
                <td><?= $this->Number->format($employe->nombreEnfant) ?></td>
                <td><?= $this->Number->format($employe->salaireBase) ?></td>
                <td><?= $employe->has('agence') ? $this->Html->link($employe->agence->name, ['controller' => 'Agences', 'action' => 'view', $employe->agence->id]) : '' ?></td>
                <td><?= $employe->has('fonction') ? $this->Html->link($employe->fonction->name, ['controller' => 'Fonctions', 'action' => 'view', $employe->fonction->id]) : '' ?></td>
                <td><?= $employe->has('service') ? $this->Html->link($employe->service->name, ['controller' => 'Services', 'action' => 'view', $employe->service->id]) : '' ?></td>
                <td><?= $employe->has('category') ? $this->Html->link($employe->category->name, ['controller' => 'Categories', 'action' => 'view', $employe->category->id]) : '' ?></td>
                <td><?= $employe->has('banque') ? $this->Html->link($employe->banque->name, ['controller' => 'Banques', 'action' => 'view', $employe->banque->id]) : '' ?></td>
                <td><?= h($employe->compte) ?></td>
                <td><?= h($employe->dateEmbauche) ?></td>
                <td><?= h($employe->created) ?></td>
                <td><?= h($employe->modified) ?></td>
                <td><?= $this->Number->format($employe->etat) ?></td>

                !-->
                <td class="actions">

                    <?= $this->Html->link(__('Affiche'), ['action' => 'view', $employe->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $employe->id]) ?>
                    <?= $this->Form->postLink(__('Supprime'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?>

                    <?php
                        $message = "";
                        if($employe->etat == 0){
                        $message = "Active";
                    }else{
                    $message = "Désactive";
                }

                   echo   $this->Form->postLink(__( $message), ['action' => 'desable', $employe->id], ['confirm' => __('êtes-vous sur de desactive # {0}?', $employe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
