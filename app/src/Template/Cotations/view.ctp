<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cotation $cotation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cotation'), ['action' => 'edit', $cotation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cotation'), ['action' => 'delete', $cotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cotations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cotations view large-9 medium-8 columns content">
    <h3><?= h($cotation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employe') ?></th>
            <td><?= $cotation->has('employe') ? $this->Html->link($cotation->employe->id, ['controller' => 'Employes', 'action' => 'view', $cotation->employe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cotation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Points') ?></th>
            <td><?= $this->Number->format($cotation->points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cotation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cotation->modified) ?></td>
        </tr>
    </table>
</div>
