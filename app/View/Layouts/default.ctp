	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>Dez Astre</title>
		<?php
			echo $this->Html->meta('icon',$this->webroot.'/dezastre.ico');
			echo $this->Html->css('style');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/overcast/jquery-ui.css" />
	    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>  </head>
	<body>
    <!-- top wrapper -->  
    <div id="topWrapper"> 
    	<div id="topBanner"></div> 
    </div>
    
    <div id="topnav">
    	<div id="dentronav">
	      	<ul>
	        	<li id="navHome">
					<?php echo $this->Html->link('HOME', array('controller' => 'produtos', 'action' => 'index')); ?>
	        	</li>
	        	<li id="navCarrinho">
					<?php echo $this->Html->link('CARRINHO', array('controller' => 'Carrinho', 'action' => 'listCarrinho')); ?>
	        	</li>
	        	<?php if (CakeSession::read('cliente') != "") 
					echo '<li id="navDados">'. $this->Html->link('MEUS DADOS', array('controller' => 'Clientes', 'action' => 'dadosCliente')). "</li>"; ?>
	      	</ul>
	      
	      	<?php
				if(CakeSession::read('cliente')==''){
		  	?>

			<div class="lr login">
				<div class="ls texto"> <form action="/portal/autenticacaos/add" method="post"> </div>
				<div class="ls texto"> <?php echo $this->Form->input('login'); ?> </div>
				<div class="ls texto"> <?php echo $this->Form->input('password'); ?> </div>
				<?php echo $this->Form->input('login_from_url', array('type' => 'hidden','value' => $this->html->url(NULL,true))); ?>
				<div class="ls botao"> <?php echo $this->Form->end('Login'); ?> </div>
			</div>
	  	<?php
		  	} else
				echo "<div class=\"lr logado \">$username ". $this->Html->link('Sair', array('controller' => 'autenticacaos', 'action' => 'del'))."</div>";
	  	?>
		
		</div>
    </div>
    <!-- end top wrapper -->
    
    <div id="wrapper"> 
    	<div id="container">
      
      	<div id="left">
	  		<div id="menuTitle" class="ui-widget-content ui-corner-all">
	  			<h3>CATEGORIAS</h3>
	  		</div>
	      	<ul id="menu">
		      	<?php
		      		foreach($list->return as $value) {
		      			if ($value->supercategoria == ""){
		      				echo "<li>". $this->Html->link($value->nome, array('controller' => 'produtos', 'action' => 'produtosListPorCategoria', $value->nome));
							$first = TRUE;
							foreach($list->return as $value2) {
								if ($value->nome == $value2->supercategoria){
									if ($first == TRUE)	echo '<ul>';
					      			echo "<li>". $this->Html->link($value2->nome, array('controller' => 'produtos', 'action' => 'produtosListPorCategoria', $value2->nome)). '</li>';
									$first = FALSE;
								}
							}
							if ($first == FALSE) echo '</ul>';
							echo '</li>';
						}
		      		}
		      	?>
	      	</ul>
      	</div>
        
        <div class="busca ui-widget-content ui-corner-all"> 
        	<?php
        		$categoria = array('Todas' => 'Todas');
	      		echo $this->Form->create(false, array(
   				 	'url' => array('controller' => 'produtos', 'action' => 'buscaProduto')
				));
				
				echo '<div style="float: left; padding: 5px;">';
	        		foreach($list->return as $value) {
		      			if ($value->supercategoria == ""){
		      				$categoria[$value->nome] = $value->nome;
						}
		      		}
		      		echo $this->Form->input('busca', array('value' => 'Digite para buscar', 'style' => 'width:250px', 'div' => false)); 
	        		echo $this->Form->input('categoria', array('options' => $categoria, 'div' => false));
				echo '</div>';
        		echo $this->Form->end('Buscar');
        	?> 
        </div>
        
        <div id="content"> 
        	<div>
          		<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>  
          	<div class="clear"></div> 
        	</div>  
        	<!-- end content -->  
        	<div class="clear" style="height:40px"></div> 
      		</div>  
      		<!-- end container --> 
    	</div>  
    
    	<div id="bottomWrapper">
	      	<div id="footer"></div>
	      	<div id="bottom-links"> 
	        <div style="padding-top:20px"> 
	        	<a href="http://www.dotemplate.com" shape="rect">Templates</a> maker
	        </div> 
		</div> 
    </div> 
</body>

<script>
	$("#navHome").addClass('current');
	$(function() {
        $("#menu").menu();
    });

	$('#busca').click(function() {
		if ($(this).val() == 'Digite para buscar')
			$(this).val('');
	});

    $('#dentronav ul li').click(function() {
    	$(".current").removeClass('current');
    	$(this).addClass('current');
    });
</script>

</html>
