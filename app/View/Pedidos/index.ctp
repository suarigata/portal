<!-- File: /app/View/Posts/index.ctp -->

<h1>Meus Pedidos</h1>
<table>
    <tr>
        <th>Pedido</th>
        <th>CPF</th>
        <th>Valor</th>
        <th>Status Pagamento</th>
        <th>Status Entrega</th>
        <th>Data de Compra</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($pedidos as $pedido): ?>
    <tr>
        <td><?php echo $pedido['id']; ?></td>
        <td>
            <?php echo $pedido['cpf']; ?>
        </td>
        <td>
            <?php echo 'R$ ' . money_format('%.2n', $pedido['valor']); ?>
        </td>
        <td>
            <?php echo $pedido['compra']; ?>
        </td>
        <td>
            <?php echo $pedido['entrega']; ?>
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
    <?php endforeach; ?>
    <?php unset($pedido); ?>
</table>