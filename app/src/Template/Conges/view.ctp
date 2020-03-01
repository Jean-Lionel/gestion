<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conge $conge
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conge'), ['action' => 'edit', $conge->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conge'), ['action' => 'delete', $conge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conge->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conge'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conges view large-9 medium-8 columns content">
    <h3><?= h($conge->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($conge->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conge->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nbre Jour') ?></th>
            <td><?= $this->Number->format($conge->nbre_jour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Etat') ?></th>
            <td><?= $this->Number->format($conge->etat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($conge->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($conge->modified) ?></td>
        </tr>
    </table>
</div>
