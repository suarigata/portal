<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>CPF</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($pedidos as $pedido): ?>
    <tr>
        <td><?php echo $pedido['Pedido']['id']; ?></td>
        <td>
            <?php echo $pedido['Pedido']['cpf'];
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($pedido); ?>
</table>