<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabela - Ecompleto</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
                include "conexao/select_request.php";
                    // Verifica se tem linhas na coluna ainda
                    if($result->num_rows): ?>
                        <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>Id_Pedido</th>
                                <th>Valor</th>
                                <th>Num_Cartão</th>
                                <th>CVV</th>
                                <th>Vencim.</th>
                                <th>Portador Card</th>
                                <th>Id_cliente</th>
                                <th>Nome</th>
                                <th>Fis/ Juri</th>
                                <th>E-mail</th>
                                <th>CPF/ CNPJ</th>
                                <th>Nascimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $mais = 1; 
                                foreach($result as $row): 
                                ?> 
                                <form id="<?= $mais ?>" method="POST" action="conexao/curl2.php">
                                    <tr>                            
                                        <th>
                                            <?= $row['id_pedido']?>
                                            <input type="hidden" name="id_pedido" value="<?= $row['id_pedido']?>" />
                                        </th>
                                        <th >
                                            <?= $row['valor_total']?>
                                            <input type="hidden" name="valor_total" value="<?= $row['valor_total']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['num_cartao']?>
                                            <input type="hidden" name="num_cartao" value="<?= $row['num_cartao']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['codigo_verificacao']?>
                                            <input type="hidden" name="codigo_verificacao" value="<?= $row['codigo_verificacao']?>"/>
                                        </th>
                                        <th >
                                            <?= $row['vencimento']?>
                                            <input type="hidden" name="vencimento" value="<?= $row['vencimento']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['nome_portador']?>
                                            <input type="hidden" name="nome_portador" value="<?= $row['nome_portador']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['id_cliente']?>
                                            <input type="hidden" name="id_cliente" value="<?= $row['id_cliente']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['nome']?>    
                                            <input type="hidden" name="nome" value="<?= $row['nome']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['tipo_pessoa']?>
                                            <input type="hidden" name="tipo_pessoa" value="<?= $row['tipo_pessoa']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['email']?>
                                            <input type="hidden" name="email" value="<?= $row['email']?>"/>
                                        </th>
                                        <!-- Verifica se é CPF ou CNPJ -->
                                            <?php if(strlen($row['cpf_cnpj'])==11):?>
                                                    <input type="hidden" name="type" value="cpf">
                                                <?php else:?>
                                                        <input type="hidden" name="type" value="cnpj">
                                            <?php endif; ?>
                                        <th>
                                            <?= $row['cpf_cnpj']?>
                                            <input type="hidden" name="cpf_cnpj" value="<?= $row['cpf_cnpj']?>"/>
                                        </th>
                                        <th>
                                            <?= $row['data_nasc']?>
                                            <input type="hidden" name="data_nasc" value="<?= $row['data_nasc']?>"/>
                                        </th>
                                            <input type="hidden" name="id_pedidopagamento" value="<?= $row['id_pedidopagamento']?>"/>
                                    </tr>
                                </form>
                            <?php $mais++; endforeach; ?>                     
                         </tbody>
                    </table>                   
                    <?php else: ?> 
                        <h1>Todos os dados ja foram verificados</h1>
                    <?php endif; ?> 
                </div>                    
            </div>
          </div>
        </div>
      </div>
</body>
<!-- Executa o form automaticamente -->
<script type="text/javascript">    
    let mais = <?= $mais ?>;
        for(let i = 1; i <= mais; i++){            
        document.getElementById(i).submit();
    }
</script>