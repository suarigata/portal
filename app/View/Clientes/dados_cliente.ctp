<div class="dados ui-widget-content ui-corner-all">
	<div class="infosCliente">
<?php
		if ($cliente != "") {
			echo '<b>NOME:</b> ' . $cliente['nome'] . '<br><br>';
			echo '<b>CPF:</b> ' . utf8_encode($cliente['cpf']) . '<br><br>';
			echo '<b>NASCIMENTO:</b> ' . $cliente['data_nascimento'] . '<br><br>';
			echo '<b>PAI:</b> ' . $cliente['nome_pai'] . '<br><br>';
			echo '<b>MAE:</b> ' . $cliente['nome_mae'] . '<br><br>';
?>
	</div>
	<div class="botoesCliente">
<?php	
		echo $this->Html->link(
				$this->Form->button('Acompanhar Compras', array('type'=>'submit')),
				array('controller' => '', 'action' => ''),
				array('escape' => false));	
		
		echo $this->Html->link(
				$this->Form->button('Criar Ticket', array('type'=>'submit')),
				array('controller' => 'atendimentos', 'action' => 'seleciona'),
				array('escape' => false));
		
		echo $this->Html->link(
				$this->Form->button('Consultar Tickets', array('type'=>'submit')),
				array('controller' => 'atendimentos', 'action' => 'consulta'),
				array('escape' => false)); 
	}
?>
	</div>
</div>

<script>
	$(function() {
		$("#navHome").removeClass('current');
        $("#navCarrinho").removeClass('current');
		$("#navDados").addClass('current');
    });
    
    $('#dentronav ul li').click(function() {
        $(".current").removeClass('current');
    	$(this).addClass('current');
    });
</script>
