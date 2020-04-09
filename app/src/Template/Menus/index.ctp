<div class="col-md-8">
	<style>
		img{
			width: 20px;
		}
	</style>
	<table>
		<tr>
			<td>Choisissez la date</td>
			<td>
				<?php echo $this->Form->create("",['type'=>'get']); 
				echo $this->Form->control("test",['type'=>'date',
					'minYear' => date('Y') - 2,
					'maxYear' => date('Y'),
					'label'=> false,

				]);

				
				?>

			</td></tr>

		<tr>
			<td>BULLETIN DE PAIE</td>
			<td>
				<?php 
				echo $this->Form->control("matricule",['label'=>false,'placeholder'=>'entre le no matricule','class'=>'form-control']);

				echo $this->Form->end();
				?>
			</td>
			
			<td>

				<a onclick="generateLinkBullettin('../xpdf/bullettin.php')">
					<?= $this->Html->image("icon/print.png") ?> </a>
				</td>
			</tr>
		<tr>
			<td>FICHE DE PAIE</td>
			
			<td>

				<a onclick="generateLink('../xpdf/filePaie.php')">
					<?= $this->Html->image("icon/print.png") ?> </a>
				</td>
			</tr>

			<tr>
				<td>INSS</td>
				<td>
					<a onclick="generateLink('../xpdf/inss.php')">
						<?= $this->Html->image("icon/print.png") ?> </a>
					</td>

				</tr>
				<tr>
					<td>IPR</td>
					<td>
						<a  onclick="generateLink('../xpdf/ipr.php')">
							<?= $this->Html->image("icon/print.png") ?> </a>
					</td>
					<td>
						<a  onclick="generateLink('../xpdf/xcel.html')">
							<?= $this->Html->image("icon/xcel.png") ?> Importer le fichier excelle </a>
					</td>
					</tr>
					<tr>
						<td>MUTUEL</td>
						<td>
							<a onclick="generateLink('../xpdf/mituel.php')">
								<?= $this->Html->image("icon/print.png") ?> </a>
							</td>

						</tr>

						<tr>
							<td>ORDRE DE VIREMENT</td>
							<td>
								<a onclick="generateLink('../xpdf/ordre_virement.php')">
									<?= $this->Html->image("icon/print.png") ?> </a>
								</td>

							</tr>


							<tr>
								<td>REGULARISATION</td>
								<td>
									<a onclick="generateLink('../xpdf/regularisation.php')">
										<?= $this->Html->image("icon/print.png") ?> </a>
									</td>

								</tr>
								<tr>
									<td>AUTRES RETENUS</td>
									<td>
										<a  onclick="generateLink('../xpdf/autre_retenu.php')">
											<?= $this->Html->image("icon/print.png") ?> </a>
										</td>

									</tr>


								</table>
							</div>

							<script>
								let currentDate = new Date();
								
								let year = currentDate.getFullYear();
								let month = currentDate.getMonth() + 1;

									$("div.date").change(function(event) {
										/* Act on the event */
										year = this.childNodes[0].value;
										month = this.childNodes[1].value
										//console.log(year + " " + month)
									});

								function generateLink(val){
									link = val+"?y="+year+"&m="+month;

									window.open(link,'_blank')
								}



								function generateLinkBullettin(val){
									let matricule = $('#matricule').val()

								if(matricule != "" && Number(matricule)>0){
									link = val+"?y="+year+"&m="+month+"&matricule="+matricule;
									window.open(link,'_blank')

									}else{
										alert("Entre le numero Matricule valide")
									}
									
								}

							
							</script>