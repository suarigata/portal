<div class="seleciona ui-widget-content ui-corner-all">
	<h2>Cartão</h2>
</div>

<div class="pagamento ui-widget-content ui-corner-all">
<?php	
	echo $this->Form->create('Pagamento');
	
	echo $this->Form->input('numero', array('label' => 'Número'));	
	echo $this->Form->input('parcela', array('label' => 'Parcelas', 'options' => $parcelas));
	echo $this->Form->input('codigo', array('label' => 'Código de Segurança'));
	echo $this->Form->input('validade', array('label' => 'Validade'));
	echo $this->Form->end('OK'); 
?>
</div>

<script>
	$(function() {
		$("#navHome").removeClass('current');
        $("#navCarrinho").addClass('current');
		$("#navDados").removeClass('current');
        $( "#accordion" ).accordion({
            collapsible: true
        });
    });

    $('#dentronav ul li').click(function() {
        $(".current").removeClass('current');
    	$(this).addClass('current');
    });
</script>
