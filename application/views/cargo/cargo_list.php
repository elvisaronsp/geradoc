<div class="areaimage">
	<center>
		<img src="{TPL_images}rescuers-icon.png" />
	</center>
</div>

<div class="titulo1">
	<?php echo $titulo;?>
</div>

<div id="msg" style="display: none;">
	<img src="{TPL_images}loader.gif" class="img_aling2" alt="Carregando" />Aguarde
	carregando...
</div>

<div id="view_content">

	<div style="float: left;">
	<div id="conteiner_subMenu">
		<?php echo $link_add; ?> &nbsp;  &nbsp; 
		</div>
	</div>
	
	<div style="float: right;">    
	            <form id="frm_search" name="frm_search" action="<?php  echo $form_action; ?>" method="post">  
	                <input class="search_text" type="text" id="search" name="search" value="<?php  echo $keyword_cargo; ?>"/>
	                <input type="submit" value="Pesquisar" class="button_search">
	                <?php echo $link_search_cancel; ?>
	            </form>
	</div>  
	
	<div style="clear:both;"></div> 
	        
	<div class="conteiner_tabela">
			<?php echo $table; ?>
	</div>

	<div class="subTitulo2">
		Total de registros: <?php echo $total_rows; ?>
	</div>

	<div class="paginacao">
		<?php echo $pagination; ?>
	</div>

</div>


