<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Credit[]|\Cake\Collection\CollectionInterface $credits
*/
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Credit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="credits index large-10 medium-10 columns content">
    <div class="medium-6 columns">
        <h3><?= __('Liste des Credits') ?></h3>
    </div>
    <div class="medium-6 columns">
        <?= $this->Form->control('search',['label'=>false,'placeholder'=>'Entre le numero Matricule']) ?>
    </div>

    <div class="table_data">

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
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
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            let searchWord = $(this).val();
            searchValue(searchWord);

        });

        function searchValue(searchWord){
            let searcvalue = searchWord;
            $.ajax({
                url: "<?php echo $this->Url->build(['controller'=>'credits','action'=>'search']) ?>",
                type: 'GET',
                data: {keyWord: searcvalue},
            })
            .done(function(response) {
                //console.log(response)
                $('.table_data').html(response);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        }
    });
</script>
