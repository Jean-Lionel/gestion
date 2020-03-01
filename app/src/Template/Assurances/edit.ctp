<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assurance $assurance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assurance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assurance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Assurances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assurances form large-9 medium-8 columns content">
    <?= $this->Form->create($assurance) ?>
    <fieldset>
        <legend><?= __('Edit Assurance') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('variable_id', ['options' => $variables]);
            echo $this->Form->control('compte');
            echo $this->Form->control('matricule');
            echo $this->Form->control('montant');
            echo $this->Form->control('periode');
            echo $this->Form->control('fonctions._ids', ['options' => $fonctions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
