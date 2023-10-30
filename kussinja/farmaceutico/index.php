
<!DOCTYPE html>
<html lang="PT">
<?php include_once 'include/header.php';
$sql="SELECT COUNT(s.id) as numVenda, SUM(s.total) as total FROM saidas s join entradas e on s.id = e.id join remedios r on e.id = r.id";
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
                      <div class="col-md-6 col-sm-6  tile_stats_count">
                        <span class="count_top"><i class="fa fa-money"></i> Núm. de Vendas</span>
                        <div class="count"><?php echo $numVenda; ?></div>
                      </div>
                      <div class="col-md-6 col-sm-6  tile_stats_count">
                        <span class="count_top"><i class="fa fa-dollar"></i> Total de Vendas</span>
                        <div class="count"><?php echo $totalVenda; ?></div>
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
                        
                        $sql="SELECT r.nome as remedio,s.qtd,e.precoVenda,s.total FROM saidas s join entradas e on s.identrada = e.id 
                        join remedios r on e.idremedio = r.id join funcionarios f on s.id = f.id join cargos c on f.id = c.id WHERE c.cargo = '$cargo' AND s.registado = '$hoje' ";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)): 
                          $remedio = $dados['remendio'];
                          $quantidade = $dados['qtd']; 
                          $preco = $dados['precoVenda']; 
                          $total = $dados['total'];  
                      ?>

                      <tbody>
                        <tr>
                          <td><?php echo $remedio; ?></td>
                          <td><?php echo $quantidade; ?></td>
                          <td><?php echo $preco; ?></td>
                          <td><?php echo $hoje; ?></td>
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

    <?php include 'include/footer.php';?>
  </body>
</html>
