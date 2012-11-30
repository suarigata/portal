<div class="seleciona ui-widget-content ui-corner-all">
	<h2>FRETE</h2>
</div>

<div class="ticket ui-widget-content ui-corner-all">
<?php
	echo $this->Form->create('Frete');	
	echo $this->Form->input('cep', array('label' => 'CEP '));
	//echo $this->Form->input('endereco', array('label' => 'Endereço '));
	echo $this->Form->input('tipoEntrega', array('label' => 'Forma de Entrega', 'options' => $tipo));
	echo $this->Form->end('OK');
	
	echo $this->Html->link(
		$this->Form->button('Voltar', array('type'=>'submit')),
	  	array('controller' => 'carrinho', 'action' => 'listCarrinho'),
	  	array('escape' => false));
?>
</div>

<div id="frete" class="seleciona ui-widget-content ui-corner-all"></div>

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
