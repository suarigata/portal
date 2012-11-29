<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<?php echo $this->Html->charset(); ?>
	<title>Dez Astre</title>
	<?php
		echo $this->Html->meta('icon','dezastre.ico');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  </head>
  <body>
    <!-- top wrapper -->  
    <div id="topWrapper"> 
      <div id="topBanner"></div> 
    </div>
    <div id="topnav">
     <div id="dentronav">
      <ul>
        <li id="current" style="border:none">
			<?php echo $this->Html->link('HOME', array('controller' => 'produtos', 'action' => 'index')); ?>
        </li>
        <li>
			<?php echo $this->Html->link('CARRINHO', array('controller' => 'Carrinho', 'action' => 'listCarrinho')); ?>
        </li>
        <?php if (CakeSession::read('cliente') != "") 
			echo "<li>". $this->Html->link('MEUS DADOS', array('controller' => 'Clientes', 'action' => 'dadosCliente')). "</li>"; ?>
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
	  	}
		else
			echo "<div class=\"lr login texto\">$username ". $this->Html->link('Sair', array('controller' => 'autenticacaos', 'action' => 'del'))."</div>";
	  ?>
		
     </div>
    </div>
    <!-- end top wrapper -->
    
    <div id="wrapper"> 
      <div id="container">
      
      	<div id="menu">
      		<h4>CATEGORIAS</h4>
	      	<?php
	      		foreach($list->return as $value) {
	      			if ($value->supercategoria == ""){
	      				echo "<div class=\"supercategoria\">". $this->Html->link($value->nome, array('controller' => 'produtos', 'action' => 'produtosListPorCategoria', $value->nome)). "</div>";
						foreach($list->return as $value2) {
							if ($value->nome == $value2->supercategoria){
				      			echo $this->Html->link($value2->nome, array('controller' => 'produtos', 'action' => 'produtosListPorCategoria', $value2->nome)). '<br>';
							}
						}
					}
	      		}
	      	?>
      	</div>
        <div style='width:800px' > 
        	<?php
        		$categoria = array('');
        		foreach($list->return as $value) {
	      			if ($value->supercategoria == ""){
	      				$categoria[$value->nome] = $value->nome;
					}
	      		}
	      		echo $this->Form->create(false, array(
   				 'url' => array('controller' => 'produtos', 'action' => 'buscaProduto')
				));
	      		echo $this->Form->input('busca', array('value' => 'Digite para buscar', 'style' => 'width:250px', 'div' => false)); 
        		echo $this->Form->input('categoria', array('options' => $categoria, 'div' => false));
        		echo $this->Form->end('Buscar', array('div' => false, 'label' => false, 'style' => 'float:right')) . "<br>";
        	?> 
        </div>
        <div id="content"> 
          <div style="margin-top:20px;">
            
        	
            <?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
            
            <!--
            <div class="one_fourth last"> 
              <div class="bloc rounded"> 
                <h3>Produto</h3>  
                <p> 
                  <img src="images/rss2.png" style="float:right;margin:0 0 0 8px" />Podemos usar essas caixinhas pra os produtos.
                </p> 
              </div> 
            </div>

            <div class="clear"></div>
            
            <div class="half"> 
              <h3>Meia pagina</h3>  
              <p>Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam, vulputate vel reiciendis risus.</p> 
            </div>  
            <div class="half last"> 
              <h3>Meia pagina</h3>  
              <p>Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam.</p> 
            </div>
            -->
            
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
          <!-- 
DO NOT REMOVE OR MODIFY THE FOOTER LINK BELOW.
If you want to remove this link please make a 10 dollars donation at www.dotemplate.com
-->  
          <a href="http://www.dotemplate.com" shape="rect">Templates</a> maker
        </div> 
      </div> 
    </div> 
  </body>
</html>
