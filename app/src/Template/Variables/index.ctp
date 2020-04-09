<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Variable[]|\Cake\Collection\CollectionInterface $variables
*/
?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Variable'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="variables index large-10 medium-10 columns content">
    <div class="medium-4 columns">
                    <h3><?= __('Variables') ?></h3>

        </div>
        <div class="medium-5 columns">
             <?= $this->Form->control('search',['placeholder'=>'Rechercher le nom du variable','label'=>false]); ?>
        </div>
       
    <div class="contante-table">
        
        <table cellpadding="0" cellspacing="0" class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
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
    </div>
</div>

<script>

    $('document').ready(function(){
        $('#search').keyup(function(){
         let keyWord = $(this).val();

         searchValue(keyWord);
     });
    function searchValue(keyWord){
         $.ajax({
            url: "<?php echo $this->Url->Build(['controller'=>'Variables','action'=>'search']) ?>",
            type: 'get',
            data: {keyWord:keyWord},
            success: function (data) {
                $('.contante-table').html(data);
            }
        });

    }
       
    })
    
</script>