 <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banques as $banque): ?>
                <tr>
                    <td><?= $this->Number->format($banque->id) ?></td>
                    <td><?= h($banque->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $banque->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $banque->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $banque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banque->id)]) ?>
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