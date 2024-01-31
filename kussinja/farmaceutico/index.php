
<!DOCTYPE html>
<html lang="PT">
<?php include_once 'include/header.php';
$sql="SELECT COUNT(v.id_venda) as numVenda, SUM(total) as total FROM vendas v join entradas e on v.id_entrada = e.id_entrada join remedios r on e.id_remedio = r.id_remedio WHERE date(v.data_venda) = '$hoje'";
$query = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_array($query);
$numVenda = $dados['numVenda'];
$totalVenda = $dados['total'];
?>

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
                <h3><i class="fa fa-dashboard"></i> Painel do Farmaceutico(a)</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                  <div class="row">
                    <center>
                      <div class="tile_count">
                        <div class="col-md-5 col-sm-5  tile_stats_count">
                          <span class="count_top"><i class="fa fa-money"></i> Núm. de Vendas</span>
                          <div class="count"><?php echo $numVenda; ?></div>
                        </div>
                        <div class="col-md-13 col-sm-13  tile_stats_count">
                          <span class="count_top"><i class="fa fa-dollar"></i> Total de Vendas</span>
                          <div class="count"><?php echo number_format($totalVenda,2,",","."); ?></div>
                        </div>
                      </div>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
