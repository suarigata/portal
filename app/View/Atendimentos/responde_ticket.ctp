<h1>Responde Ticket</h1>
<?php
	echo $this->Form->create(false, array(
    'url' => array('controller' => 'atendimentos', 'action' => 'respondeTicket', $id)
	));

	echo $this->Form->input('texto', array('label' => 'Texto'));
	echo $this->Form->end('Responder'); 
	echo $this->Html->link(
			$this->Form->button('Voltar', array('type'=>'submit')),
	  		array('controller' => 'atendimentos', 'action' => 'consulta'),
	  		array('escape' => false)); 
	//print_r($id);
	//print_r($x);
?>