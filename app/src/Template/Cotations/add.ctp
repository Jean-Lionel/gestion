<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cotation $cotation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cotations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cotations form large-9 medium-8 columns content">
    <?= $this->Form->create($cotation) ?>
    <fieldset>
        <legend><?= __('Add Cotation') ?></legend>
        <?php
            echo $this->Form->control('employe_id', ['options' => $employes]);
            echo $this->Form->control('points');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
