<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ancienete $ancienete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ancienete->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ancienete->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ancienetes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ajustements'), ['controller' => 'Ajustements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ajustement'), ['controller' => 'Ajustements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ancienetes form large-9 medium-8 columns content">
    <?= $this->Form->create($ancienete) ?>
    <fieldset>
        <legend><?= __('Edit Ancienete') ?></legend>
        <?php
            echo $this->Form->control('debut');
            echo $this->Form->control('fin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
