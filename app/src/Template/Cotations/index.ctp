<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cotation[]|\Cake\Collection\CollectionInterface $cotations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cotation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cotations index large-9 medium-8 columns content">
    <h3><?= __('Cotations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cotations as $cotation): ?>
            <tr>
                <td><?= $this->Number->format($cotation->id) ?></td>
                <td><?= $cotation->has('employe') ? $this->Html->link($cotation->employe->id, ['controller' => 'Employes', 'action' => 'view', $cotation->employe->id]) : '' ?></td>
                <td><?= $this->Number->format($cotation->points) ?></td>
                <td><?= h($cotation->created) ?></td>
                <td><?= h($cotation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cotation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cotation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotation->id)]) ?>
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
