<h1>Responde Ticket</h1>
<?php
	echo $this->Form->create('Resposta');
	echo $this->Form->input('texto', array('label' => false, 'rows' => '7'));
	echo $this->Form->end('Responder');  
?>