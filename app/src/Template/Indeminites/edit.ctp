<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Indeminite $indeminite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $indeminite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $indeminite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Indeminites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ajustements'), ['controller' => 'Ajustements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ajustement'), ['controller' => 'Ajustements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="indeminites form large-9 medium-8 columns content">
    <?= $this->Form->create($indeminite) ?>
    <fieldset>
        <legend><?= __('Edit Indeminite') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('is_activated');
            echo $this->Form->control('fonctions._ids', ['options' => $fonctions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
