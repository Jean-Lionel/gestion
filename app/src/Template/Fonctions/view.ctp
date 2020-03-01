<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fonction $fonction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fonction'), ['action' => 'edit', $fonction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fonction'), ['action' => 'delete', $fonction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fonction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fonctions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fonction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assurances'), ['controller' => 'Assurances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assurance'), ['controller' => 'Assurances', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Indeminites'), ['controller' => 'Indeminites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Indeminite'), ['controller' => 'Indeminites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fonctions view large-9 medium-8 columns content">
    <h3><?= h($fonction->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fonction->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fonction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prime') ?></th>
            <td><?= $this->Number->format($fonction->prime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fonction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fonction->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Assurances') ?></h4>
        <?php if (!empty($fonction->assurances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Banque Id') ?></th>
                <th scope="col"><?= __('Compte') ?></th>
                <th scope="col"><?= __('Matricule') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fonction->assurances as $assurances): ?>
            <tr>
                <td><?= h($assurances->id) ?></td>
                <td><?= h($assurances->name) ?></td>
                <td><?= h($assurances->banque_id) ?></td>
                <td><?= h($assurances->compte) ?></td>
                <td><?= h($assurances->matricule) ?></td>
                <td><?= h($assurances->montant) ?></td>
                <td><?= h($assurances->created) ?></td>
                <td><?= h($assurances->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assurances', 'action' => 'view', $assurances->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assurances', 'action' => 'edit', $assurances->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assurances', 'action' => 'delete', $assurances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assurances->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Indeminites') ?></h4>
        <?php if (!empty($fonction->indeminites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Is Activated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fonction->indeminites as $indeminites): ?>
            <tr>
                <td><?= h($indeminites->id) ?></td>
                <td><?= h($indeminites->name) ?></td>
                <td><?= h($indeminites->is_activated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Indeminites', 'action' => 'view', $indeminites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Indeminites', 'action' => 'edit', $indeminites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Indeminites', 'action' => 'delete', $indeminites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indeminites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($fonction->employes)): ?>
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
            <?php foreach ($fonction->employes as $employes): ?>
            <tr>
                <td><?= h($employes->id) ?></td>
                <td><?= h($employes->matricule) ?></td>
                <td><?= h($employes->nom) ?></td>
                <td><?= h($employes->prenom) ?></td>
                <td><?= h($employes->dateNaissance) ?></td>
                <td><?= h($employes->sexe) ?></td>
                <td><?= h($employes->etatCivil) ?></td>
                <td><?= h($employes->level_id) ?></td>
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
