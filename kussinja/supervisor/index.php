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
              <div class="col-lg-12 col-lg-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="tile_count">
                        <div class="col-md-6 col-sm-6  tile_stats_count">
                          <span class="count_top"><i class="fa fa-"></i> Total Produto</span>
                          <div class="count"><?php echo $totalRemedios?></div>
                        </div>
                        <div class="col-md-6 col-sm-6  tile_stats_count">
                          <span class="count_top"><i class="fa fa-dolar"></i> Lucro</span>
                          <div class="count"><?php echo $totaFornecedor?></div>
                        </div>
                        <div class="col-md-6 col-sm-6  tile_stats_count">
                          <span class="count_top"><i class="fa fa-calculator"></i> Custo</span>
                          <div class="count"><?php echo $totalFarmaceutico?></div>
                        </div>
                      </div>
                      <div class="tile_count">
                        <div class="col-md-6 col-sm-6  tile_stats_count">
                          <span class="count_top"><i class="fa fa-money"></i>Facturamento</span>
                          <div class="count">Lucro X custo</div>
                        </div>
                        <div class="col-md-6 col-sm-6  tile_stats_count">
                          <span class="count_top"><i class="fa fa-number"></i> Qt d.vendida</span>
                          <div class="count"><?php echo $totalFarmaceutico?></div>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-md-10 col-sm-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Gráfico de Venda </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="dashboard_venda"></canvas>
                  </div>
                </div>
              </div>              
              <div class="col-md-10 col-sm-10  ">
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
                        $sql="SELECT r.remedio,ven.qtd,ven.preco FROM vendas ven join entradas e on ven.id_entrada = e.id_entrada join remedios r on e.id_remedio = r.id_remedio join nivel_acesso nivel on ven.id_nivel_acesso = nivel.id_nivel_acesso WHERE date(ven.data_venda) = '$hoje' And qtd > 10 limit 10";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)): 
                          $remedio = $dados['remedio'];
                          $quantidade = $dados['qtd']; 
                          $preco = $dados['preco']; 
                          $total = $quantidade * $preco;  
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
    <script>
      // Line chart

    if ($('#dashboard_venda').length) {

var ctx = document.getElementById("dashboard_venda");
var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
        //Facturamento mensal
        datasets: [{
            label: "Facturamento",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: [0, 74, 6, 39, 20, 85, 7,2,13,10,11,23]
        }, {
            label: "Despesas",
            backgroundColor: "rgba(3, 88, 106, 0.3)",
            borderColor: "rgba(3, 88, 106, 0.70)",
            pointBorderColor: "rgba(3, 88, 106, 0.70)",
            pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(151,187,205,1)",
            pointBorderWidth: 1,
            data: [0, 23, 66, 9, 99, 4, 2,11,15,87,23,19]
        }]
    },
});

}

    </script>
  </body>
</html>
