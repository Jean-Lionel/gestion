<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employe'), ['action' => 'edit', $employe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employe'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agences'), ['controller' => 'Agences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agence'), ['controller' => 'Agences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fonctions'), ['controller' => 'Fonctions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fonction'), ['controller' => 'Fonctions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Banques'), ['controller' => 'Banques', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banque'), ['controller' => 'Banques', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cotations'), ['controller' => 'Cotations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cotation'), ['controller' => 'Cotations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employes view large-9 medium-8 columns content">
    <h3><?= h($employe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($employe->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($employe->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexe') ?></th>
            <td><?= h($employe->sexe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EtatCivil') ?></th>
            <td><?= h($employe->etatCivil) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $employe->has('level') ? $this->Html->link($employe->level->name, ['controller' => 'Levels', 'action' => 'view', $employe->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($employe->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($employe->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agence') ?></th>
            <td><?= $employe->has('agence') ? $this->Html->link($employe->agence->name, ['controller' => 'Agences', 'action' => 'view', $employe->agence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fonction') ?></th>
            <td><?= $employe->has('fonction') ? $this->Html->link($employe->fonction->name, ['controller' => 'Fonctions', 'action' => 'view', $employe->fonction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service') ?></th>
            <td><?= $employe->has('service') ? $this->Html->link($employe->service->name, ['controller' => 'Services', 'action' => 'view', $employe->service->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $employe->has('category') ? $this->Html->link($employe->category->name, ['controller' => 'Categories', 'action' => 'view', $employe->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Banque') ?></th>
            <td><?= $employe->has('banque') ? $this->Html->link($employe->banque->name, ['controller' => 'Banques', 'action' => 'view', $employe->banque->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Compte') ?></th>
            <td><?= h($employe->compte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Matricule') ?></th>
            <td><?= $this->Number->format($employe->matricule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Base Salary') ?></th>
            <td><?= $this->Number->format($employe->base_salary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ConjointFonction') ?></th>
            <td><?= $this->Number->format($employe->conjointFonction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NombreEnfant') ?></th>
            <td><?= $this->Number->format($employe->nombreEnfant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SalaireBase') ?></th>
            <td><?= $this->Number->format($employe->salaireBase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Etat') ?></th>
            <td><?= $this->Number->format($employe->etat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateNaissance') ?></th>
            <td><?= h($employe->dateNaissance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateEmbauche') ?></th>
            <td><?= h($employe->dateEmbauche) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($employe->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($employe->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cotations') ?></h4>
        <?php if (!empty($employe->cotations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employe Id') ?></th>
                <th scope="col"><?= __('Points') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employe->cotations as $cotations): ?>
            <tr>
                <td><?= h($cotations->id) ?></td>
                <td><?= h($cotations->employe_id) ?></td>
                <td><?= h($cotations->points) ?></td>
                <td><?= h($cotations->created) ?></td>
                <td><?= h($cotations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cotations', 'action' => 'view', $cotations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cotations', 'action' => 'edit', $cotations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cotations', 'action' => 'delete', $cotations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
