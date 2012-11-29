<!-- File: /app/View/Atendimento/seleciona.ctp -->
<h1>Criar Ticket</h1>
<?php
	echo $this->Form->create('Ticket');
	echo $this->Form->input('tipo', array('label' => 'Tipo de Chamada', 'options' => $tipoChamada));
	echo $this->Form->input('texto', array('label' => false, 'rows' => '7'));
	echo $this->Form->end('Enviar'); 
?>