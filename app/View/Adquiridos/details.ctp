<?php
// Jquery ta dentro do addon
echo $this->Html->script('carrinho');
?>

<div id="carrinhoTitle" class="ui-widget-content ui-corner-all">
	<h2>
		Detalhes Do Pedido
	</h2>
</div>

<table>
    <tr>
        <th>CPF</th>
        <th>Status Pagamento</th>
        <th>Data de Compra</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <tr>
        <td>
            <?php echo $pedido['cpf']; ?>
        </td>
        <td>
            <?php echo $pedido['compra']; ?>
        </td>
        <td>
            <?php echo $pedido['data']; ?>
        </td>
        <td>
            <?php 
            	echo $this->Html->link('Mais', array('controller' => 'adquiridos', 'action' => 'details', $pedido['id']));
            ?>
        </td>
    </tr>
</table>

<div id="accordion" class="carrinho">
<?php
	if (!empty($produtos)){
		foreach($produtos as $produto) {
				echo '<h3>' . utf8_encode($produto['Produto']['nome']) . '</h3>'
?>
				<div>
					<div style="float:left; margin: 10px; width: 100px;">
<?php
						echo $this->Html->image($produto['Produto']['imagem'], array('width' => '100', 'height' => '100', 'alt' => utf8_encode($produto['nome'])));
?>
					</div>
					<div class="infos">
<?php
						echo utf8_encode($produto['Produto']['nome']);
						echo '<br>Quantidade: ' . $produto['Qnt'];
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
	echo '<h3>PREÇO TOTAL R$ ' . money_format('%.2n', $pedido['valor']) . '</h3>'
?>
</div>

<div>
<?php
	echo '<h1>Endereço de Entrega</h1>';
	echo $endereco['tipo'] . ' ' . $endereco['logradouro'] . '<br>';
	echo $endereco['bairro'] . ', ' . $endereco['cidade'] . '-' . $endereco['uf'] . '<br>';
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