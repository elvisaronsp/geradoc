<div class="areaimage">
	<center>
		<img src="{TPL_images}office-women-glasses-icon.png" height="72px"/>
	</cente>
</div>

<p class="bg-success lead text-center">Setor</p>	

<div id="msg" style="display:none;"><img src="{TPL_images}loader.gif" alt="Enviando" />Aguarde carregando...</div> 

<div id="view_content">	

    <?php
    echo $link_back;
    echo "<center>".$mensagem."</center>";
    ?>
	
	<div class="formulario">	
	
	<form class="form-horizontal" role="form" id="frm1" name="frm1" action="<?php echo $form_action; ?>" method="post">
			
		<div class="panel panel-primary">
	
			  <div class="panel-heading">
			    <h3 class="panel-title"><?php echo $titulo; ?></h3>
			  </div>
			  	  
			  <div class="panel-body">
			  	
					  <div class="form-group <?php echo (form_error('campoOrgao') != '')? 'has-error':''; ?>"">
					    <label for="campoOrgao" class="col-sm-3 control-label">Órgão</label>
					    <div class="col-md-7">
					      	<?php echo form_dropdown('campoOrgao', $orgaosDisponiveis, $orgaoSelecionado, 'class="form-control"'); ?> 
					     </div>
					  </div>
					  
					  
					  <div class="form-group <?php echo (form_error('campoSetorPai') != '')? 'has-error':''; ?>">
					    <label for="campoSetorPai" class="col-sm-3 control-label">Setor pai</label>
					    <div class="col-md-7">
					   	 	<?php echo form_dropdown('campoSetorPai', $setoresPaiDisponiveis, $setorPaiSelecionado, 'class="form-control"'); ?>
					    </div>
					  </div>
					  
					  
					  <div class="form-group <?php echo (form_error('campoNome') != '')? 'has-error':''; ?>">
					    <label for="campoNome" class="col-sm-3 control-label">Nome</label>
					    <div class="col-md-7">
					    	<?php echo form_textarea($campoNome); ?>
					    </div>
					  </div>
					  
					  
					  <div class="form-group <?php echo (form_error('campoResponsavel') != '')? 'has-error':''; ?>">
					    <label for="campoResponsavel" class="col-sm-3 control-label">Chefe</label>
					    <div class="col-md-7">
					    	<?php echo form_dropdown('campoResponsavel', $responsaveis, $responsavel, 'class="form-control"'); ?>
					    </div>
					  </div>
					  
					  
					  <div class="form-group <?php echo (form_error('campoSigla') != '')? 'has-error':''; ?>">
					    <label for="campoSigla" class="col-sm-3 control-label">Sigla</label>
					    <div class="col-md-7">
					    	<?php echo form_input($campoSigla); ?>
					    </div>
					  </div>
					  
					  
					  <div class="form-group <?php echo (form_error('campoArtigo') != '')? 'has-error':''; ?>">
					    <label for="campoArtigo" class="col-sm-3 control-label">Artigo</label>
					    <div class="col-md-7">
					    	<?php echo form_dropdown('campoArtigo', $artigosDisponiveis, $artigoSelecionado, 'class="form-control"'); ?>
					    </div>
					  </div>
					  
					  <div class="form-group <?php echo (form_error('campoEndereco') != '')? 'has-error':''; ?>">
					    <label for="campoEndereco" class="col-sm-3 control-label">Endereço</label>
					    <div class="col-md-7">
					    	<?php echo form_textarea($campoEndereco) ; ?>
					    </div>
					  </div>
					  
					 
					  
					  <div class="form-group <?php echo (form_error('campoRestricao') != '')? 'has-error':''; ?>">
					  	
					  
					    <label for="campoRestricao" class="col-sm-3 control-label">Restrição</label>
					    <div class="col-md-2">
					    	<?php echo form_dropdown('campoRestricao', $restricoesDisponiveis, $restricaoSelecionada, 'class="form-control"'); ?>
					    </div>
					    <div class="col-md-7">
						   <p class="bg-warning text-justify" style="padding: 7px;">
						  	Selecione SIM caso queira restringir o <b>universo de pesquisa</b>  e de <b>produção de documentos</b> de um usuário aos documentos deste setor, 
							ou seja, usuários associados a este setor não encontrarão documentos de outros setores, apenas deste, da mesma forma que só poderão produzir documentos de remetentes deste setor.  
							<br> O valor padrão é NÃO <br>
						  </p>
						 </div>
					  </div>
					  
					    <?php 
					    if(validation_errors() != ''){
								echo '<div class="form-group">';
								echo form_error('campoOrgao');
								echo form_error('campoSetorPai'); 
								echo form_error('campoNome');
								echo form_error('campoResponsavel');
								echo form_error('campoSigla');
								echo form_error('campoArtigo');
								echo form_error('campoRestricao');
								echo form_error('campoEndereco'); 
								echo '</div>';
								}
						?>
			  </div>
			  
		</div>
		
		<div class="btn-group">
		   		<?php
			    	echo $link_cancelar;
			    	echo $link_salvar;
			    ?>
		</div>
	
	</form>
	
	</div><!-- fim: div formulario --> 

</div><!-- fim: div view_content --> 
