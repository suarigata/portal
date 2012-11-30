<div class="seleciona ui-widget-content ui-corner-all">
	<h2>Forma de Pagamento</h2>
</div>

<div class="formaPagamento ui-widget-content ui-corner-all">
<?php
	foreach($pagamentos as $chave => $tipo){
		if($tipo != 'Boleto')
			echo '<div>' . $this->Html->link($tipo, array('controller' => 'cartaos', 'action' => 'pagamento', $chave)) .'</div><br>';
		else
				echo $this->Html->link($tipo,'javascript:boleto()').'<br>';
	}
?>
</div>

<script>
	function boleto(){
		window.open("<?php echo $this->Html->url(array('controller' => 'bancos','action'=>'gerarBoleto')); ?>","Boleto","width=800,height=700,scrollbars=yes");
	}

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
