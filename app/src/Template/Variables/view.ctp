<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Variable $variable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Variable'), ['action' => 'edit', $variable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Variable'), ['action' => 'delete', $variable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $variable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Variables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variable'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="variables view large-9 medium-8 columns content">
    <h3><?= h($variable->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($variable->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Abreviation') ?></th>
            <td><?= h($variable->abreviation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($variable->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($variable->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($variable->modified) ?></td>
        </tr>
    </table>
</div>
