<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banque $banque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Banque'), ['action' => 'edit', $banque->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Banque'), ['action' => 'delete', $banque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banque->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Banques'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banque'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assurances'), ['controller' => 'Assurances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assurance'), ['controller' => 'Assurances', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Epargnes'), ['controller' => 'Epargnes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Epargne'), ['controller' => 'Epargnes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="banques view large-9 medium-8 columns content">
    <h3><?= h($banque->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($banque->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($banque->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($banque->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Assurances') ?></h4>
        <?php if (!empty($banque->assurances)): ?>
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
            <?php foreach ($banque->assurances as $assurances): ?>
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
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($banque->employes)): ?>
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
            <?php foreach ($banque->employes as $employes): ?>
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
    <div class="related">
        <h4><?= __('Related Epargnes') ?></h4>
        <?php if (!empty($banque->epargnes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Matricule') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Periode') ?></th>
                <th scope="col"><?= __('Banque Id') ?></th>
                <th scope="col"><?= __('Compte') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($banque->epargnes as $epargnes): ?>
            <tr>
                <td><?= h($epargnes->id) ?></td>
                <td><?= h($epargnes->matricule) ?></td>
                <td><?= h($epargnes->montant) ?></td>
                <td><?= h($epargnes->periode) ?></td>
                <td><?= h($epargnes->banque_id) ?></td>
                <td><?= h($epargnes->compte) ?></td>
                <td><?= h($epargnes->created) ?></td>
                <td><?= h($epargnes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Epargnes', 'action' => 'view', $epargnes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Epargnes', 'action' => 'edit', $epargnes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Epargnes', 'action' => 'delete', $epargnes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $epargnes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Credits') ?></h4>
        <?php if (!empty($banque->credits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Matricule') ?></th>
                <th scope="col"><?= __('Periode') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Banque Id') ?></th>
                <th scope="col"><?= __('Compte') ?></th>
                <th scope="col"><?= __('Montant Moi') ?></th>
                <th scope="col"><?= __('Periode Paiement') ?></th>
                <th scope="col"><?= __('Montant Restant') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($banque->credits as $credits): ?>
            <tr>
                <td><?= h($credits->id) ?></td>
                <td><?= h($credits->matricule) ?></td>
                <td><?= h($credits->periode) ?></td>
                <td><?= h($credits->montant) ?></td>
                <td><?= h($credits->banque_id) ?></td>
                <td><?= h($credits->compte) ?></td>
                <td><?= h($credits->montant_Moi) ?></td>
                <td><?= h($credits->periode_paiement) ?></td>
                <td><?= h($credits->montant_restant) ?></td>
                <td><?= h($credits->created) ?></td>
                <td><?= h($credits->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Credits', 'action' => 'view', $credits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Credits', 'action' => 'edit', $credits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Credits', 'action' => 'delete', $credits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
