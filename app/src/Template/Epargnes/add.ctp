<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Epargne $epargne
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?=__('Actions')?></li>
        <li><?=$this->Html->link(__('List Epargnes'), ['action' => 'index'])?></li>
        <li><?=$this->Html->link(__('List variables'), ['controller' => 'variables', 'action' => 'index'])?></li>
        <li><?=$this->Html->link(__('New Banque'), ['controller' => 'variables', 'action' => 'add'])?></li>
    </ul>
</nav>
<div class="epargnes form large-9 medium-8 columns content">
    <?=$this->Form->create($epargne)?>
    <fieldset>
        <legend class="text-center"><?=__('Nouvel Epargne')?></legend>

        <div class="columns medium-6">
         <?php
echo $this->Form->control('matricule');
echo $this->Form->control('montant');
 ?>
        </div>
        <div class="columns medium-6">
        <?php
echo $this->Form->control('variable_id', ['options' => $variables]);

echo $this->Form->control('periode',[
    'minYear'=>date('Y'),
    'maxYear'=>date('Y') +1
    ]
    );

echo $this->Form->button(__('Enregistre'));

?>
</div>
    </fieldset>

    <?=$this->Form->end()?>



 <h4>Formulaire pour Repporter les données des mois passé</h4>
   <?php

   echo $this->Form->create($epargne,['controller'=>'epargnes','action'=>'reporter']);

    echo $this->Form->control('temp_passe',[
        'type'=>'date',
    'minYear'=>date('Y'),
    'maxYear'=>date('Y') +1,'label'=>['text'=>'les donnes du mois ','class'=>'form-control col-md-4']
    ]
    );

    echo $this->Form->control('temp_actuel',[
    'type'=>'date',
    'minYear'=>date('Y'),
    'maxYear'=>date('Y') +1,
    'label' => ['text'=>'vers le mois en cours ', 'class'=>'form-control col-md-4 mb-4']
    ]
    );
    ?>

    <button class="mt-4" onclick="saveData(this)">Repporter</button>

    <?php

    echo $this->Form->end()

   ?>
</div>


<script>
    function saveData(e){

        //e.preventDefault();

        ///alert("Je suis cool")

        //console.log(e);

    }
</script>



