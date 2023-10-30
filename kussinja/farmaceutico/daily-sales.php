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
                <h3><i class="fa fa-shopping-cart"></i> Detalhes Vendas Diárias</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>SLS-101-21</strong> <small class="text-success">Nov 5, 2021</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Vendas</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Remédio</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Total</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php 
                        $sql = "SELECT r.nome as remedio,s.qtd,e.precoVenda,s.total FROM saidas s join entradas e on s.identrada = e.id join remedios r on e.idremedio = r.id";
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
                          <td><?php echo $total; ?></td>
                          <td>
                            <a class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> Editar</a>
                            <a class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> Apagar</a>
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
