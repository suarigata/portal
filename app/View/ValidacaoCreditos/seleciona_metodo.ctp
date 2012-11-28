<h1>Forma de Pagamento</h1>

<?php
	foreach($pagamentos as $tipo){
		if($tipo != 'Boleto')
			echo $this->Html->link($tipo, array('controller' => 'cartaos', 'action' => 'pagamento')).'<br>';
		else
			echo $this->Html->link($tipo, array('controller' => 'bancos', 'action' => 'gerarBoleto')).'<br>';
	}
?>