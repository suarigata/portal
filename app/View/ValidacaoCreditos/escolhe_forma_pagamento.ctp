<h1>Forma de Pagamento</h1>

<script>
function boleto(){
	window.open("<?php echo $this->Html->url(array('controller' => 'bancos','action'=>'gerarBoleto')); ?>","Boleto","width=800,height=700,scrollbars=yes");
}
</script>

<?php
	foreach($pagamentos as $chave => $tipo){
		if($tipo != 'Boleto')
			echo $this->Html->link($tipo, array('controller' => 'cartaos', 'action' => 'pagamento', $chave)).'<br>';
		else
			echo $this->Html->link($tipo,'javascript:boleto()').'<br>';
	}
?>