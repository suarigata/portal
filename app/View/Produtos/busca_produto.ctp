<?php
	echo 'Resultados';
	if (!array_key_exists('faultcode', $produtos)){
		$produtos = $produtos['return'];
		foreach($produtos as $chave2 => $produto) {
?>
			<div id="effect" class="ui-widget-content ui-corner-all produto">
			    <h4 class="produtoTitle ui-widget-header ui-corner-all">
<?php
					echo $this->Html->link(utf8_encode($produto['nome']), 
											array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']));
?>
				</h4>
		        <div class="produtoImagem">
<?php
				echo $this->Html->link(
					$this->Html->image($produto['imagem'], array('width' => '166', 'height' => '180', 'alt' => utf8_encode($produto['nome']))),
				  	array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
				  	array('escape' => false));
?>
	        </div>

        	<div class="produtoPreco">
<?php
				if ($qtds[$produto['codigo']] > 0){
					echo $this->Html->link('R$ '.money_format('%.2n', $precos[$produto['codigo']]), 
											array('controller' => 'produtos', 'action' => 'produtoPorCodigo', $produto['codigo']),
											array('escape' => false));
				}else{
					echo '<b>Produto indisponível</b>';
				}
?>
			</div>
	    </div>
<?php
		}
	}else echo 'Nenhum resultado para sua busca';
?>
