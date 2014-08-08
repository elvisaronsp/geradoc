
<script type="text/javascript" src="<?php echo base_url(); ?>js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tinymce/jquery.tinymce.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/calendario/_scripts/jquery.click-calendario-1.0-min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>scripts/calendario/_style/jquery.click-calendario-1.0.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.countdown.css">


<link href="<?php echo base_url(); ?>scripts/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/countdown/jquery.countdown-pt-BR.js"></script>

<script src="<?php echo base_url(); ?>scripts/jquery-ui.min.js"></script>

<div class="areaimage">
	<center>
		<img src="{TPL_images}Actions-document-edit-icon.png" height="72px" />
	</center>
</div>

<style>

.ui-autocomplete-loading {
	background: white
		url('<?php echo base_url(); ?>scripts/images/ui-anim_basic_16x16.gif')
		right center no-repeat;
}


#geral { 	
	background-color: #F7F7F7;    
}

</style>

<script type="text/javascript">
//--- Tela de Aguarde... (Loading) ---/
$.blockUI();
//--- Fim ---//

$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	
	$('#defaultCountdown').countdown({
										until: <?php echo $sess_expiration;?>, 
										onTick: warnUser, 
										format: 'HMS',
										expiryUrl: "<?php echo site_url('login/logoff'); ?>"
									});
	function warnUser(periods) { 
		   if ($.countdown.periodsToSeconds(periods) == <?php echo $sess_expiration / 4;?>) { 
			   $('#monitor').html("<img class='img_align' src='{TPL_images}/error.png' alt='!' /> Salve seu documento!");
		   } 
		}
	
	$('#year').text(austDay.getFullYear());
})


        $(document).ready(function(){

        	if ($("#campoRemetente").val() == "0") {
					$("#tr_tipo").hide();
				}

			$("#campoRemetente").bind("change", function () {
				if ($(this).val() == "empty") {
					$("#tr_tipo").hide();
				}
				else if($(this).val() != "0") {
					$("#tr_tipo").slideDown();
				}
			});

               $('#campoData').focus(function(){
                    $(this).calendario({
                        target:'#campoData',
                         top:0,
                        left:80
                    });
                });
        
        //var urlList = '<?php echo base_url(); ?>index.php/documento/loadDestinatario/teste' + campoAssunto;

        });

$(function() {
	$('option[value=empty]').prop('disabled', true);
});

//--- Fim da tela de Aguarde... (Loading) ---/
	$.unblockUI({ });
//--- Fim ---//

</script>


<div id="view_content">

<?php echo $link_back; ?>

	<div class="formulario">

		<fieldset class="conteiner2">

			<legend class="subTitulo6">Documento</legend>

			<div class="documento">

				<div class="content">
					<?php echo $message; ?>
					
					<form action="<?php echo $form_action; ?>" method="post" id="form" name="form">

						<div class="data" align="center">
							<table style="width:100%" class="table_form">
							
								<tr>
									<td class="gray"><span style="color: red;">*</span> <strong>Remetente:</strong>
									</td>
									<td valign="top" class="green">
									<?php
										$jsRemet = 'id="campoRemetente" onChange="window.location.href=(\''.site_url('documento').'/'.$acao.'/r\' + \'/\' + document.form.campoRemetente.value + \'/t/\' + document.form.campoTipo.value + \'/c/\' + document.form.campoCarimbo.value)"';

										echo form_dropdown('campoRemetente', $remetentesDisponiveis, $remetenteSelecionado, $jsRemet);
										echo form_error('campoRemetente');
										?>
									</td>
								</tr>
								
								<tr>
									<td class="gray"><strong>Setor:</strong>
									</td>
									<td valign="top" class="green"><input type="hidden" name="setorId" id="setorId" value="<?php echo $setorId; ?>" /> <?php echo form_input($campoSetor) . form_error('campoSetor'); ?>
									</td>
								</tr>
								
								<tr>
									<td class="gray"><span style="color: red;">*</span> <strong>Data:</strong>
									</td>
									<td valign="middle" class="green">
											<input type="hidden" name="id" size="6" value="<?php echo $id; ?>" />
											<?php echo form_input($campoData) . form_error('campoData'); ?>
									</td>
								</tr>
								<tr>
									<td class="gray" style="width: 140px;"><strong>Carimbo de folha:</strong>
									</td>
									<td valign="middle" class="green">
											<?php
											
												if($acao == 'update'){
													$jsCarimbo = '';

												}else{
													$jsCarimbo = 'onChange="window.location.href=(\''.site_url('documento').'/'.$acao.'/r/\' + document.form.campoRemetente.value + \'/t/\' + options[selectedIndex].value + \'/c/\' + document.form.campoCarimbo.value)"';
												}
												
												echo form_dropdown('campoCarimbo', $carimbosDisponiveis, $carimboSelecionado, $jsCarimbo);
												echo form_error('campoCarimbo');
											?>
									</td>
								</tr>
								
								
								<tr id="tr_tipo">
									<td class="gray"><span style="color: red;">*</span> <strong>Tipo:</strong>
									</td>
									<td valign="top" class="green">
									<?php
										$jsTipo = 'onChange="window.location.href=(\''.site_url('documento').'/'.$acao.'/r/\' + document.form.campoRemetente.value + \'/t/\' + options[selectedIndex].value + \'/c/\' + document.form.campoCarimbo.value)"';
										echo form_dropdown('campoTipo', $tiposDisponiveis, $tipoSelecionado, $jsTipo);
										echo form_error('campoTipo');
									?>
									</td>
								</tr>
								<tr>
									<td class="gray"><span style="color: red;">*</span> <strong>Assunto:</strong></td>
									<td valign="top" class="green">
										<?php echo form_input($campoAssunto) .form_error('campoAssunto'); ?> 
									</td>
								</tr>

							</table>
						</div>
					
						<div style="width: 320px; margin-top: 3px; margin-left: auto; margin-right: auto;display:block; display: table; background-color: #eee;">
							<div style="float: left; color: #333; height:30px; border: 1px solid #ccc; line-height: 200%;"> &nbsp;Esta sessão expira em:&nbsp;</div>
							<div id="defaultCountdown" style="width: 160px; height:30px; float: right; color: #C00000;"></div>
						</div>
						<div class="error_field" id="monitor" style="background-color: #fff; position:relative; float: right; top: -23px; padding-right: 20px;"></div>
							
							
						<!--  Campo Objetivo -->
						<div style="padding-left: 5px; padding-top: 15px; padding-bottom: 5px;">
							<span style="color: red;">*</span> <strong>Objetivo:</strong>
							<?php echo form_error('campoObjetivo'); ?>
							<br>
						</div>
						<p style="padding-left: 15px;">
						<?php echo form_textarea($campoObjetivo);?>
						</p>
						<!--  Fim do campo Objetivo -->
						
						
						<!--  Campo Documentacao -->
						<div style="padding-left: 5px;  padding-top: 25px; padding-bottom: 5px;">
							<span style="color: red;">*</span> <strong>Documentação:</strong> 
							<?php echo form_error('campoDocumentacao'); ?>
							<br>
						</div>
						<p style="padding-left: 15px;">
						<?php echo form_textarea($campoDocumentacao);?>
						</p>
						<!--  Fim do campo Documentacao -->
						
						
						<!--  Campo Analise -->
						<div style="padding-left: 5px;  padding-top: 25px; padding-bottom: 5px;">
							<span style="color: red;">*</span> <strong>Análise:</strong> 
							<?php echo form_error('campoAnalise'); ?>
							<br>
						</div>
						<p style="padding-left: 15px;">
						<?php echo form_textarea($campoAnalise);?>
						</p>
						<!--  Fim do campo Analise -->
						
						
						<!--  Campo Conclusao -->
						<div style="padding-left: 5px;  padding-top: 25px; padding-bottom: 5px;">
							<span style="color: red;">*</span> <strong>Conclusão e Parecer:</strong> 
							<?php echo form_error('campoConclusao'); ?>
							<br>
						</div>
						<p style="padding-left: 15px;">
						<?php echo form_textarea($campoConclusao);?>
						</p>
						<!--  Fim do campo Conclusao -->
						
						
						<p style="text-align: center;">
						<br>
							<input type="submit" class="button" value="Salvar" title="Salvar"/>&nbsp;&nbsp;	
						</p>
						<br>
				
						
						
					</form>
				</div>
			</div>
			<!-- fim do conteudo -->

		</fieldset>
	</div>
	<!-- fim da div  formulario -->
</div>
<!-- fim da div  view_content -->



<script type="text/javascript">


$().ready(function() {

   $("textarea#campoObjetivo").tinymce({
	      script_url : '<?php echo base_url(); ?>js/tinymce/tinymce.min.js',
	      language : 'pt_BR',
	  	  menubar : false,
	  	  browser_spellcheck : true,
	  	  content_css : '<?php echo base_url(); ?>css/style_editor.css',
	  	  width : 800,
	  	  relative_urls: false,
	  	  setup : function(ed){
	  		ed.on('init', function() {
	  			   this.getDoc().body.style.fontSize = '10.5pt';
	  			});
	  	},

	  	plugins: "preview image jbimages spellchecker textcolor table lists code",
	  	
	  	toolbar: "undo redo | bold italic underline strikethrough | subscript superscript removeformat | alignleft aligncenter alignright alignjustify | forecolor backcolor | preview code | fontsizeselect  ",
	  	statusbar : false,
	  	relative_urls: false
	  	
	   });

   $("textarea#campoDocumentacao").tinymce({
	    script_url : '<?php echo base_url(); ?>js/tinymce/tinymce.min.js',
 		language : 'pt_BR',
 		menubar : false,
 		width : 800,
 		browser_spellcheck : true,

 		forced_root_block : 'div', // transforma a quebra de linha em linha simples

 		setup : function(ed){
 		ed.on('init', function() {
 			   this.getDoc().body.style.fontSize = '10.5pt';
 			});
 		},

	  	plugins: "preview image jbimages spellchecker textcolor table lists code",
	  	
	  	toolbar: "undo redo | bold italic underline strikethrough | subscript superscript removeformat | alignleft aligncenter alignright alignjustify | forecolor backcolor | bullist numlist outdent indent | preview code | fontsizeselect  ",
	  	statusbar : false,
	  	relative_urls: false

	  });

   $("textarea#campoAnalise").tinymce({
	      script_url : '<?php echo base_url(); ?>js/tinymce/tinymce.min.js',
	      language : 'pt_BR',
	  	  menubar : false,
	  	  browser_spellcheck : true,
	  	  content_css : '<?php echo base_url(); ?>css/style_editor.css',
	  	  width : 800,
	  	  relative_urls: false,
	  	  setup : function(ed){
	  		ed.on('init', function() {
	  			   this.getDoc().body.style.fontSize = '10.5pt';
	  			});
	  	},

	  	plugins: "preview image jbimages spellchecker textcolor table lists code",
	  	
	  	toolbar: "undo redo | bold italic underline strikethrough | subscript superscript removeformat | alignleft aligncenter alignright alignjustify | forecolor backcolor | bullist numlist outdent indent | preview code | fontsizeselect table | jbimages ",
	  	statusbar : false,
	  	relative_urls: false

	  });


   $("textarea#campoConclusao").tinymce({
	      script_url : '<?php echo base_url(); ?>js/tinymce/tinymce.min.js',
	      language : 'pt_BR',
	  	  menubar : false,
	  	  browser_spellcheck : true,
	  	  content_css : '<?php echo base_url(); ?>css/style_editor.css',
	  	  width : 800,
	  	  relative_urls: false,
	  	  setup : function(ed){
	  		ed.on('init', function() {
	  			   this.getDoc().body.style.fontSize = '10.5pt';
	  			});
	  	},

	  	plugins: "preview image jbimages spellchecker textcolor table lists code",
	  	
	  	toolbar: "undo redo | bold italic underline strikethrough | subscript superscript removeformat | alignleft aligncenter alignright alignjustify | forecolor backcolor | bullist numlist outdent indent | preview code | fontsizeselect table | jbimages ",
	  	statusbar : false,
	  	relative_urls: false

	  });


});

        //--- Fim da tela de Aguarde... (Loading) ---/
       	$.unblockUI({ });
        //--- Fim ---//
        						
</script>

