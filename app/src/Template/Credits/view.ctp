<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Credit $credit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Credit'), ['action' => 'edit', $credit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit'), ['action' => 'delete', $credit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="credits view large-9 medium-8 columns content">
    <h3><?= h($credit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Variable') ?></th>
            <td><?= $credit->has('variable') ? $this->Html->link($credit->variable->name, ['controller' => 'Variables', 'action' => 'view', $credit->variable->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Compte') ?></th>
            <td><?= h($credit->compte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($credit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Matricule') ?></th>
            <td><?= $this->Number->format($credit->matricule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Montant') ?></th>
            <td><?= $this->Number->format($credit->montant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Montant Moi') ?></th>
            <td><?= $this->Number->format($credit->montant_Moi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Periode Paiement') ?></th>
            <td><?= $this->Number->format($credit->periode_paiement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Montant Restant') ?></th>
            <td><?= $this->Number->format($credit->montant_restant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Periode') ?></th>
            <td><?= h($credit->periode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Credit') ?></th>
            <td><?= h($credit->date_credit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Fin') ?></th>
            <td><?= h($credit->date_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($credit->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($credit->modified) ?></td>
        </tr>
    </table>
</div>
