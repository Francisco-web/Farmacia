<?php 
include_once '../conexao.php';
//listar entradas
$sql_entrada = "SELECT COUNT(id_entrada) as numentrada FROM entradas";
$query = mysqli_query($conexao,$sql_entrada);
$dados_entrada = mysqli_fetch_assoc($query);
$totalRemedios = $dados_entrada['numentrada'];

//listar fornecedores
$sql_fornecedor = "SELECT COUNT(id_fornecedor)as numfornecedor FROM fornecedores";
$query = mysqli_query($conexao,$sql_fornecedor);
$dados_fornecedor = mysqli_fetch_assoc($query);
$totaFornecedor = $dados_fornecedor['numfornecedor'];

//listar farmaceuticos
$sql_funcionario = "SELECT COUNT(id_nivel_acesso) as numfarmaceutico  FROM nivel_acesso na inner join usuarios u on na.id_usuario = u.id_usuario WHERE nivel = 'Farmaceutico(a)'";
$query = mysqli_query($conexao,$sql_funcionario);
$dados_funcionario = mysqli_fetch_assoc($query);
$totalFarmaceutico = $dados_funcionario['numfarmaceutico'];
?>
<!DOCTYPE html>
<html lang="PT">
<?php include_once 'include/header.php';?>

  <body class="nav-md">
            <?php include_once 'include/sidebar.php';?>
            <?php include_once 'include/menufooter.php';?>
          </div>
        </div>
        <?php include_once 'include/topnav.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-dashboard"></i> Painel</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                  <div class="row">
                    <center>
                    <div class="tile_count">
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-medkit"></i> Total Remédios</span>
                        <div class="count"><?php echo $totalRemedios?></div>
                      </div>
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-truck"></i> Total Fornecedores</span>
                        <div class="count"><?php echo $totaFornecedor?></div>
                      </div>
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Farmaceuticos</span>
                        <div class="count"><?php echo $totalFarmaceutico?></div>
                      </div>
                    </div>
                  </center>
</div>
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quantidade Vendidos</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>              
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top 10 Remédios Vendidos</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Remédio</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <?php
                        $sql="SELECT remedio,qtd,preco_venda,total FROM vendas vd join entradas ed on vd.id_entrada = ed.id_entrada join remedios rm on ed.id_remedio = rm.id_remedio";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)): 
                          $remedio = $dados['remendio'];
                          $quantidade = $dados['qtd']; 
                          $preco = $dados['preco_Venda']; 
                          $total = $dados['total'];  
                      ?>

                      <tbody>
                        <tr>
                          <td><?php echo $remedio; ?></td>
                          <td><?php echo $quantidade; ?></td>
                          <td><?php echo $preco; ?></td>
                          <td><?php echo $total; ?></td>
                        </tr>
                        <?php endwhile;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'include/footer.php';?>
  </body>
</html>
