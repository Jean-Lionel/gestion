           <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('montant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Variable') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($epargnes as $epargne): ?>
            <tr>
                <td><?= $this->Number->format($epargne->id) ?></td>
                <td><?= $this->Number->format($epargne->matricule) ?></td>
                <td><?= $this->Number->format($epargne->montant) ?></td>
                <td><?= h($epargne->periode) ?></td>
                <td><?= $epargne->has('variable') ? $this->Html->link($epargne->variable->name, ['controller' => 'Variables', 'action' => 'view', $epargne->variable->id]) : '' ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $epargne->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $epargne->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $epargne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $epargne->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>