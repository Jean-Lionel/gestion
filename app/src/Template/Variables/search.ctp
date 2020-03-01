
        <table cellpadding="0" cellspacing="0" class="table-responsive">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('abreviation') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($variables as $variable): ?>
                <tr>
                    <td><?= $this->Number->format($variable->id) ?></td>
                    <td><?= h($variable->name) ?></td>
                    <td><?= h($variable->abreviation) ?></td>
                    <td><?= h($variable->created) ?></td>
                    <td><?= h($variable->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $variable->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $variable->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $variable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $variable->id)]) ?>
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