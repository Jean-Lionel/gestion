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
    <div class="columns medium-6">
        <h3><?= __('LISTE DE TOUS LES EMPLOYES') ?></h3>
    </div>
    
    <div class="columns medium-4">
        <?= $this->Form->create("",['type'=>'get']); ?>
    <div class="row">
         <div class="medium-5 columns">
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

        <div class="medium-7 columns">
            <?= $this->Form->control("keyWord",['label'=>false,'default'=>$this->request->query('keyWord'),'placeholder'=>'Entre votre mot de rechercher']); ?>
        </div>
        
    </div>
    <?= $this->Form->end(); ?>
    </div>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                
       
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $key => $employe): ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $this->Number->format($employe->matricule) ?></td>
                <td><?= h(strtoupper($employe->nom)) ?></td>
                <td><?= h(ucfirst($employe->prenom)) ?></td>
                
   
                <td class="actions">

                    <!-- <?= $this->Html->link(__('Affiche le buletin de paie'), ['action' => 'view', $employe->id]) ?> -->

                    <a href="../../">tEST</a>
                 
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
