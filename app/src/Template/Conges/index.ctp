<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conge[]|\Cake\Collection\CollectionInterface $conges
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conge'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conges index large-9 medium-8 columns content">
    <h3><?= __('Conges') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbre_jour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('etat') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conges as $conge): ?>
            <tr>
                <td><?= $this->Number->format($conge->id) ?></td>
                <td><?= h($conge->name) ?></td>
                <td><?= $this->Number->format($conge->nbre_jour) ?></td>
                <td><?= h($conge->created) ?></td>
                <td><?= h($conge->modified) ?></td>
                <td><?= $this->Number->format($conge->etat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conge->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conge->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conge->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
