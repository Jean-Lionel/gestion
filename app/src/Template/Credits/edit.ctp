<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Credit $credit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $credit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $credit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Credits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="credits form large-9 medium-8 columns content">
    <?= $this->Form->create($credit) ?>
    <fieldset>
        <legend class="text-center"><?= __('Modifier le  Crédit') ?></legend>

        <div class="columns medium-6">
            <?php
            echo $this->Form->control('matricule');
            // echo $this->Form->control('periode');
            echo $this->Form->control('montant');
        ?>
            
        </div>

        <div class="columns medium-6">
            <?php 
            echo $this->Form->control('periode_paiement',['label'=>'PERIODE DE PAIMENT ', 'placeholder'=> 'Exemple : 18 ']);
            // echo $this->Form->control('montant_restant');
            echo $this->Form->control('date_credit');
            echo $this->Form->control('id');
            ?>
        </div>

        <div class="columns medium-12">

        <?php
            echo $this->Form->control('variable_id', ['options' => $variables
                ,'label'=>'Periode']);
            // echo $this->Form->control('compte');
            // echo $this->Form->control('montant_Moi');
            // echo $this->Form->control('date_fin');
        ?>
            
        </div>
        <div class="columns medium-4">

             <?= $this->Form->button(__('Modifier')) ?>
    <?= $this->Form->end() ?>
            
        </div>
       
    </fieldset>
   
</div>
