<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Retraite $retraite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Retraites'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="retraites form large-9 medium-8 columns content">
    <?= $this->Form->create($retraite) ?>
    <fieldset>
        <legend><?= __('Add Retraite') ?></legend>
        <?php
            echo $this->Form->control('age');
            echo $this->Form->control('name');
            echo $this->Form->control('actif');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
