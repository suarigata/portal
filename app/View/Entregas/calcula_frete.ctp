<h1>FRETE</h1>

<?php
	echo $this->Form->create('Frete');	
	echo $this->Form->input('cep', array('label' => 'CEP '));
	//echo $this->Form->input('endereco', array('label' => 'Endereço '));
	echo $this->Form->input('tipoEntrega', array('label' => 'Forma de Entrega', 'options' => $tipo));
	echo $this->Form->end('OK');
	
	echo $this->Html->link(
		$this->Form->button('Voltar', array('type'=>'submit', 'style' => 'float: right; margin-left: 600px;')),
	  	array('controller' => 'carrinho', 'action' => 'listCarrinho'),
	  	array('escape' => false));
?>