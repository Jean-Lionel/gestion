<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ancienete $ancienete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ancienete'), ['action' => 'edit', $ancienete->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ancienete'), ['action' => 'delete', $ancienete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ancienete->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ancienetes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ancienete'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ajustements'), ['controller' => 'Ajustements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ajustement'), ['controller' => 'Ajustements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ancienetes view large-9 medium-8 columns content">
    <h3><?= h($ancienete->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ancienete->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debut') ?></th>
            <td><?= $this->Number->format($ancienete->debut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fin') ?></th>
            <td><?= $this->Number->format($ancienete->fin) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ajustements') ?></h4>
        <?php if (!empty($ancienete->ajustements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ancienete Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Prafond') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ancienete->ajustements as $ajustements): ?>
            <tr>
                <td><?= h($ajustements->id) ?></td>
                <td><?= h($ajustements->ancienete_id) ?></td>
                <td><?= h($ajustements->category_id) ?></td>
                <td><?= h($ajustements->prafond) ?></td>
                <td><?= h($ajustements->montant) ?></td>
                <td><?= h($ajustements->created) ?></td>
                <td><?= h($ajustements->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ajustements', 'action' => 'view', $ajustements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ajustements', 'action' => 'edit', $ajustements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ajustements', 'action' => 'delete', $ajustements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ajustements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
