<!-- File: /app/View/Atendimento/seleciona.ctp -->
<?php
	echo $this->Html->link(
		$this->Form->button('Reclamação', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => '', 'action' => ''),
	  	array('escape' => false));
	  	
	  echo $this->Html->link(
		$this->Form->button('Sugestão', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => '', 'action' => ''),
	  	array('escape' => false));
	  	
	 echo $this->Html->link(
		$this->Form->button('Dúvida', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => '', 'action' => ''),
	  	array('escape' => false));
	  	
	 echo $this->Html->link(
		$this->Form->button('Pedido', array('type'=>'submit', 'style' => 'float: left; margin-right: 600px;')),
	  	array('controller' => '', 'action' => ''),
	  	array('escape' => false)); 	 		
?>