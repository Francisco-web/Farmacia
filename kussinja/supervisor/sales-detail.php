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
                <h3><i class="fa fa-desktop"></i> Detalhe de Venda</h3>
              </div>
              
            </div>

            <div class="clearfix"></div>
              <?php
                if (isset($_SESSION['msg'])) {
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
                }
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                  <?php
                    if(isset($_GET['factura'])){
                      $factura = $_GET['factura'];                      
                      $sql = "SELECT us.nome_usuario,r.remedio,vend.factura_no,vend.data_venda FROM vendas vend join entradas e on vend.id_entrada = e.id_entrada join remedios r on e.id_remedio = r.id_remedio join nivel_acesso nc on vend.id_nivel_acesso= nc.id_nivel_acesso join usuarios us on nc.id_usuario = us.id_usuario WHERE factura_no = 'kj5909' Order by remedio ";
                      $query = mysqli_query($conexao,$sql);
                      $dados = mysqli_fetch_array($query);
                      $data_venda = $dados['data_venda'];
                      $farmaceutico = $dados['nome_usuario'];

                      //$dados=mysqli_fetch_array($query);
                    }     
                  ?>
                    <h2><strong><?php echo $factura;?></strong> <small class="text-success"><?php echo $data_venda;?></small></h2>
                    <div class="clearfix"></div>
                    <h3>Farmacêutico(a): <?php echo $farmaceutico;?></h3>
                  </div>
                  <div class="x_content">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Produto</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Total </th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <?php 
                       if(isset($_GET['factura'])){
                        $factura = $_GET['factura'];                      
                        $sql = "SELECT vend.estado_venda,e.id_remedio,r.imagem,r.remedio,vend.valorPago,vend.factura_no,vend.qtd,e.preco_Venda,vend.total FROM vendas vend join entradas e on vend.id_entrada = e.id_entrada join remedios r on e.id_remedio = r.id_remedio WHERE factura_no ='$factura' Order by id_venda desc";
                        $query = mysqli_query($conexao,$sql);
                        $grande_total= 0;
                        while($dados = mysqli_fetch_assoc($query)): 
                          $id_Produto = $dados['id_remedio'];
                          $remedio = $dados['remedio'];
                          $qtd = $dados['qtd']; 
                          $preco = $dados['preco_Venda']; 
                          $total = $dados['total']; 
                          $estado_venda = $dados['estado_venda']; 
                          $grande_total+=$total;
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $remedio?></td>
                          <td><?php echo $qtd?></td>
                          <td><?php echo $preco?></td>
                          <td><?php echo $total?></td>
                          <td><?php echo $estado_venda?></td>
                        </tr>
                      </tbody>
                      <?php endwhile;
                        echo"<p><strong>Montante: ".number_format($grande_total,2,",",".")." aKz</strong></p>
                           ";
                      }?>
                    </table>
                    <div class="col-md-12 col-sm-12 ">
                     <a href="venda/anular_venda.php?ID=<?php echo $factura?>" class='btn btn-sm btn-danger text-white'><i class='fafa-trash'></i> Anular venda</a>
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
