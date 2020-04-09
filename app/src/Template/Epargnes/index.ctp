<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Epargne[]|\Cake\Collection\CollectionInterface $epargnes
 */
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Epargne'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Banques'), ['controller' => 'Banques', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Banque'), ['controller' => 'Banques', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="epargnes index large-10 medium-10 columns content">
    
    <div class="medium-6 columns">
        <h3><?= __('Liste des epargnes') ?></h3>
    </div>
    <div class="medium-6 columns">
        <?= $this->Form->control('search',['label'=>false,'placeholder'=>'Entre le numero matricule']) ?>
    </div>

    <div class="table_content">

           <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('montant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periode',"Periode d' epargne") ?></th>
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
        $('#search').keyup(function(event) {
            /* Act on the event */

            let keyWord = $(this).val();

            searchValue(keyWord);
        });

        function searchValue(keyWord){
            let searchKey = keyWord;

            $.ajax({
                url: "<?php echo $this->Url->build(['controller'=>'epargnes','action'=>'search']) ?>",
                type: 'GET',
                data: {searchKey: searchKey},
            })
            .done(function(response) {
                $('.table_content').html(response);
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