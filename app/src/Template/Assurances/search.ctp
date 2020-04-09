<table cellpadding="0" cellspacing="0" class="table table-responsive">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
        <th scope="col"><?= $this->Paginator->sort('variable_id') ?></th>

        <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
        <th scope="col"><?= $this->Paginator->sort('montant') ?></th>
        <th scope="col"><?= $this->Paginator->sort('periode') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($assurances as $assurance): ?>
        <tr>
            <td><?= $this->Number->format($assurance->id) ?></td>
            <td><?= $assurance->has('variable') ? $this->Html->link($assurance->variable->name, ['controller' => 'Variables', 'action' => 'view', $assurance->variable->id]) : '' ?></td>
            <td><?= $this->Number->format($assurance->matricule) ?></td>
            <td><?= $this->Number->format($assurance->montant) ?></td>
            <td><?= h($assurance->periode) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $assurance->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assurance->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assurance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assurance->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
