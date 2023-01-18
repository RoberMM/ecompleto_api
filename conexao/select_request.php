<?php
    include "conexao.php";

    //Select para buscar todos os dados necessarios para realizar o envio pra API
    $result = mysqli_query($con,"SELECT pp.id 'id_pedidopagamento', pp.id_pedido, pp.id_formapagto, pp.retorno_intermediador, pp.num_cartao, pp.codigo_verificacao, pp.nome_portador, 
    CONCAT(SUBSTR(pp.vencimento, 6, 2), SUBSTR(pp.vencimento, 3, 2)) 'vencimento', p.valor_total, c.id 'id_cliente', c.nome, c.email, c.cpf_cnpj, c.data_nasc, c.tipo_pessoa, c.id_loja 
    FROM pedidos_pagamentos AS pp
    INNER JOIN pedidos AS p ON pp.id_pedido = p.id
    INNER JOIN clientes AS c ON p.id_cliente = c.id
    WHERE pp.id_formapagto = 3 AND c.id_loja <> 92 AND pp.retorno_intermediador IS NULL;
    ;");
?>