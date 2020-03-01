<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conge $conge
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conge->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conge->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conges'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="conges form large-9 medium-8 columns content">
    <?= $this->Form->create($conge) ?>
    <fieldset>
        <legend><?= __('Edit Conge') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('nbre_jour');
            echo $this->Form->control('etat');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
