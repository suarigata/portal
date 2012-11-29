<h1>SEus Ticket</h1>
<?php
	//print_r ($ticket);
	foreach($ticket as $key => $x){
		echo 'Tipo de Ticket: '.$x['TipoChamado'].'<br>';
		foreach($x['Texto'] as $chave=>$comentario){
			$y = $x['Data'];
			echo $y[$chave].' '.$comentario.'<br>';
			//echo $y[$chave].'<br>'.'<br>';
		}
		echo $this->Html->link(
			$this->Form->button('Responder', array('type'=>'submit')),
	  		array('controller' => 'atendimentos', 'action' => 'respondeTicket', $key),
	  		array('escape' => false)); 
	}
?>