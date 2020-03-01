<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Indeminite $indeminite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Indeminite'), ['action' => 'edit', $indeminite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Indeminite'), ['action' => 'delete', $indeminite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indeminite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Indeminites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Indeminite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ajustements'), ['controller' => 'Ajustements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ajustement'), ['controller' => 'Ajustements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="indeminites view large-9 medium-8 columns content">
    <h3><?= h($indeminite->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($indeminite->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($indeminite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Activated') ?></th>
            <td><?= $this->Number->format($indeminite->is_activated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fonctions') ?></h4>
        <?php if (!empty($indeminite->fonctions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($indeminite->fonctions as $fonctions): ?>
            <tr>
                <td><?= h($fonctions->id) ?></td>
                <td><?= h($fonctions->name) ?></td>
                <td><?= h($fonctions->created) ?></td>
                <td><?= h($fonctions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fonctions', 'action' => 'view', $fonctions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fonctions', 'action' => 'edit', $fonctions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fonctions', 'action' => 'delete', $fonctions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fonctions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ajustements') ?></h4>
        <?php if (!empty($indeminite->ajustements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ancienete Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Indeminite Id') ?></th>
                <th scope="col"><?= __('Prafond') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($indeminite->ajustements as $ajustements): ?>
            <tr>
                <td><?= h($ajustements->id) ?></td>
                <td><?= h($ajustements->ancienete_id) ?></td>
                <td><?= h($ajustements->category_id) ?></td>
                <td><?= h($ajustements->indeminite_id) ?></td>
                <td><?= h($ajustements->prafond) ?></td>
                <td><?= h($ajustements->montant) ?></td>
                <td><?= h($ajustements->created) ?></td>
                <td><?= h($ajustements->modified) ?></td>
                <td><?= h($ajustements->name) ?></td>
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
