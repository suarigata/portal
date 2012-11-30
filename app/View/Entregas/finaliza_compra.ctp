<h1>Sua compra foi realizada com sucesso</h1>

<?php
print_r( $tipo);
	if($tipo != 'boleto'){
		echo $this->Html->link(
			$this->Form->button('Ok', array('type'=>'submit')),
				array('controller' => 'produtos'),
			  	array('escape' => false));
	}
	else{
		echo $this->Html->link($tipo,'javascript:boleto()').'<br>';
	}
?>

<script>
	function boleto(){
		window.open("<?php echo $this->Html->url(array('controller' => 'bancos','action'=>'gerarBoleto')); ?>","Boleto","width=800,height=700,scrollbars=yes");
	}
</script>