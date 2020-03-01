<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assurance $assurance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Assurance'), ['action' => 'edit', $assurance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Assurance'), ['action' => 'delete', $assurance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assurance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Assurances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assurance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="assurances view large-9 medium-8 columns content">
    <h3><?= h($assurance->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($assurance->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Variable') ?></th>
            <td><?= $assurance->has('variable') ? $this->Html->link($assurance->variable->name, ['controller' => 'Variables', 'action' => 'view', $assurance->variable->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Compte') ?></th>
            <td><?= h($assurance->compte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($assurance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Matricule') ?></th>
            <td><?= $this->Number->format($assurance->matricule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Montant') ?></th>
            <td><?= $this->Number->format($assurance->montant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Periode') ?></th>
            <td><?= h($assurance->periode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($assurance->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($assurance->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fonctions') ?></h4>
        <?php if (!empty($assurance->fonctions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Prime') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($assurance->fonctions as $fonctions): ?>
            <tr>
                <td><?= h($fonctions->id) ?></td>
                <td><?= h($fonctions->name) ?></td>
                <td><?= h($fonctions->prime) ?></td>
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
</div>
