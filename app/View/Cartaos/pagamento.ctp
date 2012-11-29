<!-- File: /app/View/Cartaos/pagamento.ctp -->
<h1>Cartao</h1>

<?php
	//print_r($par);
	//print_r ($validate);
	
	echo $this->Form->create(false, array(
    'url' => array('controller' => 'cartaos', 'action' => 'efetua')
	));
	
	echo $this->Form->input('numero', array('label' => 'NUMERo'));	
	echo $this->Form->input('parcela', array('label' => 'Parcelas', 'options' => $parcelas));
	echo $this->Form->input('codigo', array('label' => 'Codigo de Segurança'));
	echo $this->Form->input('validade', array('label' => 'Validade'));
	echo $this->Form->end('OK'); 
?>