<?php
// Jquery ta dentro do addon
echo $this->Html->script('addon'); // TODO tem que tirar isso
echo $this->Html->script('carrinho');
?>

<h2>CARRINHO</h2>

<div style="float: left">
<?php
	echo $this->Html->link(
		$this->Form->button('Limpar Carrinho', array('type'=>'submit', 'style' => 'float: right; margin-left: 600px;')),
	  	array('controller' => 'carrinho', 'action' => 'limpaCarrinho'),
	  	array('escape' => false));
	  	
	echo $this->Html->link(
		$this->Form->button('Finalizar Compra', array('type'=>'submit', 'style' => 'float: right; margin-left: 600px;')),
	  	array('controller' => 'validacaoCreditos', 'action' => 'escolheFormaPagamento'),
	  	array('escape' => false));
	  	
	echo $this->Html->link(
		$this->Form->button('Calcular Frete', array('type'=>'submit', 'style' => 'float: right; margin-left: 600px;')),
	  	array('controller' => 'entregas', 'action' => 'calculaFrete'),
	  	array('escape' => false));  	
?>
</div>

<?php
	if (!empty($cods)){
		foreach($cods as $chave => $qtd) {
			$produto = $produtos[$chave]['return'][0];
			echo '<div class="produto" style="float:left; margin: 10px; width: 100px;">';
			echo $this->Html->link(
				$this->Html->image($produto['imagem'], array('width' => '100', 'height' => '100', 'alt' => utf8_encode($produto['nome']))),
								  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
								  	array('escape' => false));
			echo '</div>';
			
			echo '<div class="infos" style="float:left; margin: 10px; width: 550px; height: 100px;">';
				echo $this->Html->link(utf8_encode($produto['nome']), array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']));
				echo '<br>Quantidade: ' . $this->dezastre->quantidade($chave,$qtd);
				echo '<br>Preço unitário: ' . money_format('%.2n', doubleval($precos[$chave]));
				echo '<br>Preço total: ' . money_format('%.2n', doubleval($precos[$chave]) * $qtd);
				echo $this->Html->link('<br>Excluir item', 
										array('controller' => 'carrinho', 'action' => 'removerItem', $chave), 
										array('escape' => false));
			echo '</div>';
		}
	}
	echo $this->Js->writeBuffer();
	echo '<div style="flaot: left;">PREÇO TOTAL R$ ' . money_format('%.2n', $total) . '</div>';
?>

<script>
	$(function() {
		$("#navHome").removeClass('current');
        $("#navCarrinho").addClass('current');
		$("#navDados").removeClass('current');
    });
    
    $('#dentronav ul li').click(function() {
        $(".current").removeClass('current');
    	$(this).addClass('current');
    });
</script>
