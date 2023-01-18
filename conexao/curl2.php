<?php
    //Variaeis para passar nas querys de UPDATE
    $id = $_POST['id_pedidopagamento'];
    $id_cli = $_POST['id_cliente'];

    //Header
    $headers = array(
    "Content-Type: application/json",
    );

    //URL com o token já inserido na URl
    $url = "https://api11.ecompleto.com.br/exams/processTransaction?accessToken=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdG9yZUlkIjoiNCIsInVzZXJJZCI6IjkwNDAiLCJpYXQiOjE2NzM2MzcwMTUsImV4cCI6MTY3NDI2OTk5OX0.es5E5C2NYWlXcUwmHTAcE_AWkqwjHfhzy6q-IrEd6SE";


    //Pega os dados que seram passados através do POST
    $primeiro = array(
        'external_order_id' => intval($_POST['id_pedido']),
        'amount' => floatval($_POST['valor_total']),
        'card_number' => $_POST['num_cartao'],
        'card_cvv' => $_POST['codigo_verificacao'],
        'card_expiration_date' => $_POST['vencimento'],
        'card_holder_name' => $_POST['nome_portador'],
        'customer' => array(
            'external_id' => intval($_POST['id_cliente']),
            'name' => $_POST['nome'],
            'type' => $_POST['tipo_pessoa'],
            'email' => $_POST['email'],
            'documents' => array(
                'type' => $_POST['type'],
                'number' => $_POST['cpf_cnpj'],
            ),
            'birthday' => $_POST['data_nasc'],
        ),
    );

    //Encode do array
    $jsonDataEncoded = json_encode($primeiro);

    //Funções curl
    $client = curl_init();
    curl_setopt($client, CURLOPT_URL, $url);
    curl_setopt($client, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($client, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($client, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //Resposta do curl
    $response = curl_exec($client);
    //Finaliza o curl
    curl_close($client);

    //Decode no json
    $jsonDataDecoded = json_decode($response);

    //Pega o valor do transaction_code
    $ts = $jsonDataDecoded->Transaction_code;
    
    //realiza a verificação para ver se o pedido foi cancelado
    if($ts == 04){
        include "conexao.php";

        $query = "UPDATE pedidos_pagamentos AS pp
        INNER JOIN pedidos AS p ON pp.id_pedido = p.id
        SET pp.retorno_intermediador = '$ts', pp.data_processamento = current_timestamp(), p.id_situacao = '3' 
        WHERE pp.id = '$id'";

        mysqli_query($con, $query);
        mysqli_close($con);

        header("Location: ../index.php");
        }else{
            include "conexao.php";

            $query = "UPDATE pedidos_pagamentos SET retorno_intermediador = '$ts', data_processamento = current_timestamp() WHERE id = '$id'";

            mysqli_query($con, $query);
            mysqli_close($con);

            header("Location: ../index.php");
    }
?>