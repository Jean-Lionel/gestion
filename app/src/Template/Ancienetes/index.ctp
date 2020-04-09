<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ancienete[]|\Cake\Collection\CollectionInterface $ancienetes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ancienete'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ajustements'), ['controller' => 'Ajustements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ajustement'), ['controller' => 'Ajustements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ancienetes index large-9 medium-8 columns content">
    <h3><?= __('Ancienetes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('debut') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ancienetes as $ancienete): ?>
            <tr>
                <td><?= $this->Number->format($ancienete->id) ?></td>
                <td><?= $this->Number->format($ancienete->debut) ?></td>
                <td><?= $this->Number->format($ancienete->fin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ancienete->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ancienete->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ancienete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ancienete->id)]) ?>
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
