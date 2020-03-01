        <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
              
                <th scope="col"><?= $this->Paginator->sort('montant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('variable_id') ?></th>
            
                <th scope="col"><?= $this->Paginator->sort('montant_Moi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periode_paiement') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('date_credit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_fin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($credits as $credit): ?>
            <tr>
                <td><?= $this->Number->format($credit->id) ?></td>
                <td><?= $this->Number->format($credit->matricule) ?></td>
                <td><?= $this->Number->format($credit->montant) ?></td>
                <td><?= $credit->has('variable') ? $this->Html->link($credit->variable->name, ['controller' => 'Variables', 'action' => 'view', $credit->variable->id]) : '' ?></td>
                <td><?= $this->Number->format($credit->montant_Moi) ?></td>
                <td><?= $this->Number->format($credit->periode_paiement) ?></td>
                <td><?= h($credit->date_credit) ?></td>
                <td><?= h($credit->date_fin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $credit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $credit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $credit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credit->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>