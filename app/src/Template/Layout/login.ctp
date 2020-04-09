<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Authentification</title>
	<link rel="stylesheet" href="style.css">
	<?= $this->Html->css('login'); ?>
</head>
<body>
	<?= $this->fetch('content') ?>


	<div class="login-box">
		<!-- <img src="/ahmar/app/img/avatart.png" alt="" class="avatar"> -->

		<?= $this->Html->image('avatart.png', ['alt' => 'profile','class'=>'avatar']); ?>

		
		
		<h1>INDENTIFICATION</h1>
	<!-- 	<form action="">
			<p>User Name</p>
			<input type="text" name="username" placeholder="Enter UserName"> 
			<p>PASSWORD</p>
			<input type="password" name="username" placeholder="Enter password"> 

			<input type="submit" value="Login">
	
		</form> -->


		<?= $this->Form->create() ?>
		<?php
		echo $this->Form->control('username',['label'=>['text'=>'INDETINFIANT'],'placeholder'=>'User Name']);
		echo $this->Form->control('password',['label'=>['text'=>'MOT DE PASSE'],'placeholder'=>'Password']);
		// echo $this->Form->button('connexion',['class'=>'button-box']);
		echo $this->Form->input('connexion',['type'=>'submit']);
		echo $this->Form->end();
		?>

		<div style="background: red; margin-top: 20px;">
			 <?= $this->Flash->render() ?>
		</div>
	</div>
	
</body>
</html>