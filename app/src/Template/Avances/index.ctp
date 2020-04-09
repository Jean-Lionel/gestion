<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Avance[]|\Cake\Collection\CollectionInterface $avances
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Avance'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Variables'), ['controller' => 'Variables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Variable'), ['controller' => 'Variables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="avances index large-10 medium-10 columns content">
    
    <div class="columns medium-6">
        <h3><?= __('Avances') ?></h3>
    </div>
    <div class="columns medium-4">
        <?= $this->Form->control('keyword',['placeholder'=>'Entre le numero mattricule','label'=>false]) ?>
    </div>

    <div class="table-content">
        
   
    <table cellpadding="0" cellspacing="0" class="table table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
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
     </div>
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


<script>
    $(document).ready(function() {

        $('#keyword').keyup(function() {
            const keyword = $(this).val()
            searchWord(keyword);
        });


        function searchWord(keyword){
            $.ajax({
                url: "<?= $this->Url->build(['controller'=>'avances','action'=>'search']) ?>",
                type: 'GET',
            
                data: {keyword: keyword},
            })
            .done(function(response) {
                

                console.log(response)
                $('.table-content').html(response)
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
