<!-- File: /app/View/Produtos/busca_por_categoria.ctp -->

<?php
	//print_r($listaProd);
    foreach($listaProd['return'] as $value) {
      	echo $value['nome']."<br>";
	}
?>