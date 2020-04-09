

<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Banque[]|\Cake\Collection\CollectionInterface $banques
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Banque'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assurances'), ['controller' => 'Assurances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assurance'), ['controller' => 'Assurances', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Epargnes'), ['controller' => 'Epargnes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Epargne'), ['controller' => 'Epargnes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="banques index large-9 medium-8 columns content">
    <div class="medium-6 columns"> <h3><?= __('Banques') ?></h3></div>
    <div class="medium-6 columns"> <?= $this->Form->control('search',['label'=>false,'placeholder'=>'Entre le nom banquaire'])?> </div>
    
    
    <div class="table-content">
        
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id','No') ?></th>
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
    </div>
</div>



<script>
    $('document').ready(function(){

        $("#search").keyup(function(){
            let searchKey = $(this).val()
            searchValue(searchKey);
        });

    function searchValue(searchKey){
            let data = searchKey;
            $.ajax({
                url:
                "<?php echo $this->Url->build(['controller'=>'Banques','action'=>'search']); ?>",
                type: 'get',
                data: {keyWord:data},
                success: function (response) {
                    $('.table-content').html(response)
                }
            });
        }

    })
</script>
