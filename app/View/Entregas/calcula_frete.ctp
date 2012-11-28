<h1>FRETE</h1>

<?php

	echo $this->Form->create(false, array(
    'url' => array('controller' => 'entregas', 'action' => 'calculaFrete')
	));
	
	echo $this->Form->input('remetente', array('label' => 'CEP remetente'));	
	echo $this->Form->input('destino', array('label' => 'CEP destino'));
	echo $this->Form->input('tipoEntrega', array('label' => 'Forma de Entrega'));
	echo $this->Form->end('OK'); 

print_r($frete);
print_r($car);	
?>