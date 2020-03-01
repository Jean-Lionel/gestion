<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
   
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-2">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul>
                <li>
                     <?php echo $this->Html->link('Employes',['controller'=>'employes','action'=>'index']) ?>
                </li>
                <li>
                     <?php echo $this->Html->link('Banques',['controller'=>'banques','action'=>'index']) ?>
                </li>
                <li>
                     <?php echo $this->Html->link('Fonctions',['controller'=>'fonctions','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Services',['controller'=>'services','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Agences',['controller'=>'agences','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Categories',['controller'=>'categories','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Ancienetes',['controller'=>'ancienetes','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Ajustements',['controller'=>'ajustements','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Mise à pied',['controller'=>'misepieds','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Epargnes',['controller'=>'epargnes','action'=>'index']) ?>
                </li>
                <li>
                     <?php echo $this->Html->link('Crédit',['controller'=>'credits','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Assurances',['controller'=>'assurances','action'=>'index']) ?>
                </li>

            </ul>

            <ul class="right">
                 <li>
                     <?php echo $this->Html->link('Avances',['controller'=>'avances','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Assurances',['controller'=>'assurances','action'=>'index']) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Assurances',['controller'=>'assurances','action'=>'index']) ?>
                </li>
                
            </ul>
        </div>
    </nav>
    
    <?= $this->Flash->render() ?>
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>

</body>
</html>
