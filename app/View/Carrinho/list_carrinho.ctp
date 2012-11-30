<?php
// Jquery ta dentro do addon
echo $this->Html->script('carrinho');
?>

<div id="carrinhoTitle" class="ui-widget-content ui-corner-all">
	<h2>
		CARRINHO
		<?php
			echo $this->Html->link(
				$this->Form->button('Limpar Carrinho', array('type'=>'submit')),
			  	array('controller' => 'carrinho', 'action' => 'limpaCarrinho'),
			  	array('escape' => false));
			  	
			echo $this->Html->link(
				$this->Form->button('Finalizar Compra', array('type'=>'submit')),
			  	array('controller' => 'validacaoCreditos', 'action' => 'escolheFormaPagamento'),
			  	array('escape' => false));
			  	
			echo $this->Html->link(
				$this->Form->button('Calcular Frete', array('type'=>'submit')),
			  	array('controller' => 'entregas', 'action' => 'calculaFrete'),
			  	array('escape' => false));  	
		?>
	</h2>
</div>

<div id="accordion" class="carrinho">
<?php
	if (!empty($cods)){
		foreach($cods as $chave => $qtd) {
			$produto = $produtos[$chave]['return'][0];

				echo '<h3>' . utf8_encode($produto['nome']) . '</h3>'
?>
				<div>
					<div style="float:left; margin: 10px; width: 100px;">
<?php
						echo $this->Html->link(
							$this->Html->image($produto['imagem'], array('width' => '100', 'height' => '100', 'alt' => utf8_encode($produto['nome']))),
											  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
											  	array('escape' => false));
?>
					</div>
					<div class="infos">
<?php
						echo $this->Html->link(utf8_encode($produto['nome']), array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']));
						echo '<br>Quantidade: ' . $this->dezastre->quantidade($chave,$qtd);
						echo '<br>Preço unitário: ' . money_format('%.2n', doubleval($precos[$chave]));
						echo '<br>Preço total: ' . money_format('%.2n', doubleval($precos[$chave]) * $qtd);
						echo $this->Html->link('<br>Excluir item', 
												array('controller' => 'carrinho', 'action' => 'removerItem', $chave), 
												array('escape' => false));
?>
					</div>
				</div>
<?php
		}
	}
?>
</div>

<div class="precoTotal ui-widget-content ui-corner-all">
<?php
	echo '<h3>PREÇO TOTAL R$ ' . money_format('%.2n', $total) . '</h3>'
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
