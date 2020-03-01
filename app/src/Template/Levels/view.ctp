<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Level'), ['action' => 'edit', $level->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Level'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="levels view large-9 medium-8 columns content">
    <h3><?= h($level->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($level->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($level->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Base Salary') ?></th>
            <td><?= $this->Number->format($level->base_salary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($level->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($level->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($level->employes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Matricule') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Prenom') ?></th>
                <th scope="col"><?= __('DateNaissance') ?></th>
                <th scope="col"><?= __('Sexe') ?></th>
                <th scope="col"><?= __('EtatCivil') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Base Salary') ?></th>
                <th scope="col"><?= __('ConjointFonction') ?></th>
                <th scope="col"><?= __('Telephone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('NombreEnfant') ?></th>
                <th scope="col"><?= __('SalaireBase') ?></th>
                <th scope="col"><?= __('Agence Id') ?></th>
                <th scope="col"><?= __('Fonction Id') ?></th>
                <th scope="col"><?= __('Service Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Banque Id') ?></th>
                <th scope="col"><?= __('Compte') ?></th>
                <th scope="col"><?= __('DateEmbauche') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Etat') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($level->employes as $employes): ?>
            <tr>
                <td><?= h($employes->id) ?></td>
                <td><?= h($employes->matricule) ?></td>
                <td><?= h($employes->nom) ?></td>
                <td><?= h($employes->prenom) ?></td>
                <td><?= h($employes->dateNaissance) ?></td>
                <td><?= h($employes->sexe) ?></td>
                <td><?= h($employes->etatCivil) ?></td>
                <td><?= h($employes->level_id) ?></td>
                <td><?= h($employes->base_salary) ?></td>
                <td><?= h($employes->conjointFonction) ?></td>
                <td><?= h($employes->telephone) ?></td>
                <td><?= h($employes->email) ?></td>
                <td><?= h($employes->nombreEnfant) ?></td>
                <td><?= h($employes->salaireBase) ?></td>
                <td><?= h($employes->agence_id) ?></td>
                <td><?= h($employes->fonction_id) ?></td>
                <td><?= h($employes->service_id) ?></td>
                <td><?= h($employes->category_id) ?></td>
                <td><?= h($employes->banque_id) ?></td>
                <td><?= h($employes->compte) ?></td>
                <td><?= h($employes->dateEmbauche) ?></td>
                <td><?= h($employes->created) ?></td>
                <td><?= h($employes->modified) ?></td>
                <td><?= h($employes->etat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employes', 'action' => 'view', $employes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employes', 'action' => 'edit', $employes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employes', 'action' => 'delete', $employes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
