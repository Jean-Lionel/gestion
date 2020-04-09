<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assurance $assurance
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Assurances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assurances form large-10 medium-9 columns content">
   <div class="columns medium-6">
       <?= $this->Form->create($assurance) ?>
       <fieldset>
           <legend><?= __('Ajouter une Assurance') ?></legend>
           <?php

           echo $this->Form->control('variable_id', ['options' => $variables]);
           echo $this->Form->control('matricule');
           echo $this->Form->control('montant');
           echo $this->Form->control('periode');

           ?>
       </fieldset>
       <?= $this->Form->button(__('Enregistre')) ?>
       <?= $this->Form->end() ?>
   </div>
    <div class="columns medium-6">

        <h4>Formulaire pour Repporter les données des mois passé</h4>
        <?php

        echo $this->Form->create($assurance,['controller'=>'epargnes','action'=>'reporter']);

        echo $this->Form->control('temp_passe',[
                'type'=>'date',
                'minYear'=>date('Y'),
                'maxYear'=>date('Y') +1,'label'=>['text'=>'les données du mois ','class'=>'form-control col-md-12 mb-4']
            ]
        );

        echo $this->Form->control('temp_actuel',[
                'type'=>'date',
                'minYear'=>date('Y'),
                'maxYear'=>date('Y') +1,
                'label' => ['text'=>'vers le mois en cours ', 'class'=>'form-control col-md-12 mb-4']
            ]
        );
        ?>

        <button class="mt-4" onclick="saveData(this)">Repporter</button>

        <?php

        echo $this->Form->end()

        ?>

    </div>
</div>
