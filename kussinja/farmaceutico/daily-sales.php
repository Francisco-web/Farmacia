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
                <h3><i class="fa fa-shopping-cart"></i> Detalhes de Vendas</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add_carrinho.php" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Vendas</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>imagem</th>
                          <th>Factura No.</th>
                          <th>Produto</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Total</th>
                          <th>Pago</th>
                          <th>Troco</th>
                          <th>Estado</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php 
                        $sql = "SELECT estado_venda,e.id_remedio,r.imagem,r.remedio,vend.valorPago,vend.factura_no,vend.qtd,e.preco_Venda,vend.total FROM vendas vend join entradas e on vend.id_entrada = e.id_entrada join remedios r on e.id_remedio = r.id_remedio WHERE vend.id_nivel_acesso = '$idFarmaceutico' and date(data_venda) = '$hoje' Order by id_venda desc";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)): 
                          $id_Produto = $dados['id_remedio'];
                          $imagem = $dados['imagem'];
                          $remedio = $dados['remedio'];
                          $quantidade = $dados['qtd']; 
                          $preco = $dados['preco_Venda']; 
                          $total = $dados['total']; 
                          $valorPago = $dados['valorPago'];  
                          $factura = $dados['factura_no']; 
                          $estado_venda = $dados['estado_venda']; 
                          $troco= $valorPago - $total;
                      ?>
                      <tbody>
                        <tr>
                          <td><img src="../imagens/uploads/remedios/<?php echo $imagem; ?>" alt="<?php echo $remedio; ?>" width="50" style="border-radius:10px"></td>
                          <td><?php echo $factura; ?></td>
                          <td><?php echo $remedio; ?></td>
                          <td><?php echo $quantidade; ?></td>
                          <td><?php echo $preco; ?></td>
                          <td><?php echo $total; ?></td>
                          <td><?php echo $valorPago; ?></td>
                          <td><?php echo number_format($troco,2,",","."); ?></td>
                          <td><?php echo $estado_venda; ?></td>
                          <td>
                            <a href="visualizar_product.php?id=<?php echo "$id_Produto";?>" class="btn btn-sm btn-success text-white"><i class="fa fa-search-plus"></i> Visualizar</a>
                          </td>
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

    <?php include_once 'include/footer.php';?>
  </body>
</html>
