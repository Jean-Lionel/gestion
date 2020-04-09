
    <table cellpadding="0" cellspacing="0" class="table table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('variable_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('montant_moi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('montant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_avance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_fin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avances as $avance): ?>
            <tr>
                <td><?= $this->Number->format($avance->id) ?></td>
                <td><?= $this->Number->format($avance->matricule) ?></td>
               <!--  <td><?= h($avance->compte) ?></td> -->
                <td><?= $avance->has('variable') ? $this->Html->link($avance->variable->name, ['controller' => 'Variables', 'action' => 'view', $avance->variable->id]) : '' ?></td>
                <td><?= $this->Number->format($avance->montant_moi) ?></td>
                <td><?= $this->Number->format($avance->montant) ?></td>
                <td><?= $this->Number->format($avance->periode) ?></td>
                <td><?= h($avance->date_avance) ?></td>
                <td><?= h($avance->date_fin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $avance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $avance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $avance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $avance->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>