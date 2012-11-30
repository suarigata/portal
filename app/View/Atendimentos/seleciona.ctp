<div class="seleciona ui-widget-content ui-corner-all">
	<h2>Criar Ticket</h2>
</div>

<div class="ticket ui-widget-content ui-corner-all">
<?php
	echo $this->Form->create('Ticket');
	echo $this->Form->input('tipo', array('label' => 'Tipo de Chamada', 'options' => $tipoChamada));
	echo $this->Form->input('texto', array('label' => false, 'rows' => '7'));
	echo $this->Form->end('Enviar'); 
?>
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
