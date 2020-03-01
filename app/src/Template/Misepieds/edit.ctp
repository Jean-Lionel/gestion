<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Misepied $misepied
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $misepied->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $misepied->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Misepieds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="misepieds form large-9 medium-8 columns content">
    <?= $this->Form->create($misepied) ?>
    <fieldset>
        <legend><?= __('Nouvel Mise à pied') ?></legend>
        <div class="medium-6 columns">
             <?php
            echo $this->Form->control('matricule');
            echo $this->Form->control('montant');
            echo $this->Form->control('id');
            ?>
        </div>
        <div class="medium-6 columns">
            <?php

                 echo $this->Form->control('motif');
        ?>
        <?= $this->Form->button(__('Enregistre')) ?>
        <?= $this->Form->end() ?>
        </div>
       
       
    </fieldset>
    
</div>
