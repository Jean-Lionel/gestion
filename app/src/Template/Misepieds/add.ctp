<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Misepied $misepied
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Misepieds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="misepieds form large-9 medium-8 columns content">
    <?= $this->Form->create($misepied) ?>
    <fieldset>
        <legend><?= __('Nouvel Mise à pied') ?></legend>
        <div class="medium-6 columns">
           <?php
           echo $this->Form->control('matricule');
           echo $this->Form->control('nombre_jour',['label'=>'Nombre de jour','class'=>'nombre_jour']);
           ?>
       </div>
       <div class="medium-6 columns">
        <?php

        echo $this->Form->control('motif');
        ?>
        <?= $this->Form->button(__('Enregistre')) ?>
        <?= $this->Form->end() ?>
    </div>


</fieldset>

</div>


<script>
    $('document').ready(function(){

        $('button[type="submit"]').click(function(event) {
            event.preventDefault();

            let matricule = $('#matricule').val();
            let nombre_jour = $('.nombre_jour').val();
            let motif = $('#motif').val();

            if(Number(matricule) && Number(nombre_jour) && motif != ""){
                saveValue(matricule,nombre_jour,motif);
            }else{
                 alert('vérifier bien vos données')
            }

            

        });

        function saveValue(matricule,nombre_jour,motif){

            $.ajax({

                url:"<?php echo '../../xpdf/utilities.php'; ?>",
                type: 'get',
                data: {matricule, nombre_jour , motif},
                success: function (response) {
                    console.log('succes ')
                    console.log(response)

                    if(response == 'success'){
                        alert('La mise a pied réussi')
                    }else if(response == 'error'){
                        alert('Le Numero matricule invalide')
                    }
                },
                error : function(reponse){
                    console.log('eroor')
                     console.log(response)
                }
            });

        }

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