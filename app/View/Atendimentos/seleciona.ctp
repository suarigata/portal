<!-- File: /app/View/Atendimento/seleciona.ctp -->
<h1>Criar Ticket</h1>
<?php
	echo $this->Form->create(false, array(
    	'url' => array('controller' =>'clientes', 'action' => 'dadosCliente')
		));

	echo $this->Form->input('texto', array('label' => 'Texto'));
	echo $this->Form->input('tipo', array('label' => 'Tipo de Chamada', 'options' => $tipoChamada));
	echo $this->Form->end('Enviar'); 
?>