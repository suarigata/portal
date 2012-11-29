<div id="effect" class="ui-widget-content ui-corner-all produtoDetalhe">
    <h1 class="produtoTitle ui-widget-header ui-corner-all" style="padding-left: 10px !important;">

<?php
	if (!array_key_exists('faultcode', $produto)){
		$produto = $produto['return'];
		foreach($produto as $chave => $prod) {
			echo utf8_encode($prod['nome']);
?>
			</h1>
	        <div class="produtoLeft">
<?php 			echo '<img src="' . $prod['imagem'] . '" width=200 height=200 alt="' . utf8_encode($prod['nome']) . '"/>'; 

				if ($qtd[$prod['codigo']] > 0){
					echo $this->Html->link(
						$this->Form->button('Comprar', array('type'=>'submit')),
					  	array('controller' => 'carrinho', 'action' => 'addCarrinho', $prod['codigo']),
					  	array('escape' => false));
				}else{
					echo '<br><b>Produto indisponível</b>';
				}
?>

			</div>
	        <div class="detalhes">
<?php
				echo '<h2>R$ ' . money_format('%.2n', $preco[$prod['codigo']]) . '</h2>';
				echo '<h3>DESCRIÇÃO:</h3>' . utf8_encode($prod['descricao']) . '<br><br>';
				echo '<b>FABRICANTE:</b> ' . utf8_encode($prod['fabricante']) . '<br>';
				echo '<b>CÓDIGO DO PRODUTO:</b> ' . $prod['codigo'] . '<br>';
				echo '<b>ALTURA:</b> ' . $prod['altura'] . '<br>';
				echo '<b>LARGURA:</b> ' . $prod['largura'] . '<br>';
			}
?>
			</div>

<?php
	}
?>