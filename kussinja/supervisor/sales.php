<!DOCTYPE html>
<html lang="PT">
<?php include_once 'include/header.php';?>

  <body class="nav-md">
            <?php include 'include/sidebar.php';?>
            <?php include 'include/menufooter.php';?>
          </div>
        </div>

        <?php include_once 'include/topnav.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-desktop"></i> Vendas</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Venda</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Factura no.</th>
                          <th>Data</th>
                          <th>Total</th>
                          <th>Estado</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php
                        //COnsultar vendas
                        $grande_total= 0;
                        $query=mysqli_query($conexao,"SELECT factura_no,vd.total,us.nome_usuario,data_venda,estado_venda FROM vendas vd inner join nivel_acesso na on vd.id_nivel_acesso = na.id_nivel_acesso join usuarios us on na.id_usuario = us.id_usuario order by factura_no");
                        while($dados=mysqli_fetch_array($query)):
                          $factura = $dados['factura_no'];
                          $data = $dados['data_venda'];
                          $montante = $dados['total'];
                          $estado_venda = $dados['estado_venda'];
                          $grande_total +=$montante;
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $factura;?></td>
                          <td><?php echo $data;?></td>
                          <td><?php echo $montante;?></td>
                          <td><?php echo $estado_venda;?></td>
                          <td>
                              <a href="sales-detail.php?factura=<?php echo $factura;?>" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> Ver detalhes</a>
                          </td>
                          
                        </tr>
                      </tbody>
                      <?php endwhile;
                        echo"<p><strong>Montante: ".number_format($grande_total,2,",",".")." aKz</strong></p>"
                      ?>
                    </table>
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
