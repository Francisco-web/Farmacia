<!DOCTYPE html>
<html lang="PT">
<?php include_once 'include/header.php';
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
                <h3><i class="fa fa-desktop"></i> Caixa </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro de Caixa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Farmacêutico</th>
                            <th>Saldo Inicial</th>
                            <th>Saldo Final</th>
                            <th>Estado</th>
                            <th>Abertura</th>
                            <th>Fecho</th>
                          </tr>
                        </thead>
                        <?php
                          $sql = "SELECT atendente,saldo_abertura,saldo_fecho,estado_caixa,data_abertura,data_fecho	
                          FROM caixa ORDER BY atendente DESC ";
                          $query = mysqli_query($conexao,$sql);
                          while($dados = mysqli_fetch_assoc($query)):
                            $atendente = $dados['atendente'];
                            $saldo_abertura = $dados['saldo_abertura'];
                            $saldo_fecho = $dados['saldo_fecho'];
                            $estado_caixa = $dados['estado_caixa'];
                            $data_abertura = $dados['data_abertura'];
                            $data_fecho = $dados['data_fecho'];


                          ?>
                        <tbody>
                          <tr>
                            <td><?php echo $atendente;?></td>
                            <td><?php echo $saldo_abertura;?></td>
                            <td><?php echo $saldo_fecho;?></td>
                            <td class="btn btn-sm btn-success text-white"><?php echo $estado_caixa;?></td>
                            <td><?php echo $data_abertura;?></td>
                            <td><?php echo $data_fecho;?></td>
                          </tr>
                          <?php endwhile;
                          mysqli_close($conexao);?>
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
    <?php include 'include/footer.php';?>
  </body>
</html>
