<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banque $banque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Banques'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assurances'), ['controller' => 'Assurances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assurance'), ['controller' => 'Assurances', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Epargnes'), ['controller' => 'Epargnes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Epargne'), ['controller' => 'Epargnes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="banques form large-9 medium-8 columns content">
    <?= $this->Form->create($banque) ?>
    <fieldset>
        <legend><?= __('Add Banque') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
