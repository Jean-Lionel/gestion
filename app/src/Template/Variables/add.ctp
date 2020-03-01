<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Variable $variable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Variables'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="variables form large-9 medium-8 columns content">
    <?= $this->Form->create($variable) ?>
    <fieldset>
        <legend><?= __('Add Variable') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('abreviation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
