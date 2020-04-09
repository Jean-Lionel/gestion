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
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
     <?= $this->Html->css('monStyle') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery.js') ?>
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script> -->

    <?= $this->fetch('script') ?>
</head>
<body id="body-content">
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-2">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="menu-top">
                <li>
                     <?php echo $this->Html->link('Employées'.
                     $this->Html->image("icon/employee.png"),

                     ['controller'=>'employes','action'=>'index'],
                     ['escape' =>false]
                 ) ?>
                </li>
                <li>
                     <?php 
                     echo $this->Html->link('Banques'.
                        $this->Html->image("icon/banque.png")
                        ,['controller'=>'banques','action'=>'index'],
                        ["escape" => false]
                    ) ?>
                </li>
                <li>
                     <?php 
                     echo $this->Html->link('Fonctions'.
                        $this->Html->image("icon/function.png")
                     ,['controller'=>'fonctions','action'=>'index'],
                     ['escape' => false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Services'.
                        $this->Html->image("icon/service.png")
                     ,['controller'=>'services','action'=>'index'],
                     ["escape"=>false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Agences'.
                        $this->Html->image("icon/location.png")
                     ,['controller'=>'agences','action'=>'index'],
                     ["escape"=>false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Categories'.
                        $this->Html->image("icon/category.png")
                     ,['controller'=>'categories','action'=>'index'],
                     ["escape"=>false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Ancienetes'.
                        $this->Html->image("icon/old.png")
                     ,['controller'=>'ancienetes','action'=>'index'],
                     ["escape"=>false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Ajustements'.
                        $this->Html->image("icon/balance.png")
                     ,['controller'=>'ajustements','action'=>'index'],
                     ["escape"=>false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Mise à pied'.
                        $this->Html->image("icon/mise.png")
                     ,['controller'=>'misepieds','action'=>'index'],
                     ["escape" => false]
                 ) ?>
                </li>

                <li>
                     <?php echo $this->Html->link(
                        'Epargnes'.
                          $this->Html->image("icon/epargnes.png")
                        ,['controller'=>'epargnes','action'=>'index'],
                        ['escape'=>false]
                 ) ?>
                </li>
                <li>
                     <?php echo $this->Html->link('Crédit'.
                        $this->Html->image("icon/credit.png"),
                     ['controller'=>'credits','action'=>'index'],
                     ['escape' => false]
                 ) 
                     ?>
                </li>

                <li>
                     <?php echo $this->Html->link('Assurances'.
                        $this->Html->image('icon/asssurance.png')
                     ,['controller'=>'assurances','action'=>'index'],
                     ['escape' => false]
                 ) ?>
                </li>
                 <li>
                     <?php echo $this->Html->link('Avances'.
                        $this->Html->image('icon/avances.png')
                        ,['controller'=>'avances','action'=>'index'],
                        ['escape'=> false]
                 ) ?>
                </li>
              
                <li>
                     <?php echo $this->Html->link('Annexes'.
                        $this->Html->image('icon/library.png')
                        ,['controller'=>'Menus','action'=>'index'],
                        ['escape'=> false]
                 ) ?>
                </li>
                 <li>
                     <?php echo $this->Html->link('Deconnexion'.
                        $this->Html->image('icon/shutdown.png'),

                     ['controller'=>'users','action'=>'logout'],
                     ['escape'=> false]) ?>
                </li>

            </ul>
        </div>
    </nav>
    <div style="clear: both;">
        
    </div>
    
    <?= $this->Flash->render() ?>
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <script>
        $(document).scroll(function(event) {
            /* Act on the event */
             let scrolllength = parseInt($(window).scrollTop());
             let body = $("#body-content");

             if(scrolllength > 1700){
                body.addClass('fixed-element')
            }
            
        });

        
            let link = window.location.href.split('/');
            let currentVal = link.pop();
            let a = $('a[href*='+currentVal+']')

            a.addClass('');

            

     
    </script>
</body>
</html>
