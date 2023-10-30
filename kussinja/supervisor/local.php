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
                <h3><i class="fa fa-map"></i> Local Remédio</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <?php
                if (isset($_SESSION['msg'])) {
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
                }
              ?> 
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista Local de Remédios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#addlocal" data-toggle="modal" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Local</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Local</th>
                          <th>Descrição</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php
                        $sql = "SELECT id_local,nome_local,descricao FROM local_estoque ";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)):
                          $id = $dados['id_local'];
                          $local = $dados['nome_local'];
                          $descricao = $dados['descricao'];
                      ?>

                      <tbody>
                        <tr>
                          <td><?php echo $local;?></td>
                          <td><?php echo $descricao;?></td>
                          <td>
                              <a href="editarlocal.php?id=<?php echo $id;?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> editar</a>
                              <a href="local/deletar.php?id=<?php echo $id;?>" onclick="return confirm('Tens Certeza que desejas apagar?')"  class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
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
    <!-- Modal Adicionar Cargo-->
    <div class="modal fade" id="addlocal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <div class="title_left">
              </div>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="local/inserir.php" method="POST"  a-parsley-validate class="form-horizontal form-label-left">
              <div class="row">
              <br><br><br>
               <div class="col-md-12 col-sm-12">
                <input class="form-control" name="local_remedio" placeholder="Local do Remédio"/>
              </div><br><br><br>
               <div class="col-md-12 col-sm-12">
                <textarea class="form-control" name="descricao" placeholder="Descrição do Remédio"></textarea>
              <br>
              <div class="col-md-12 col-sm-12 ">
                <a href="medicine.php" class="btn btn-primary" type="button">Cancelar</a>
                <button type="submit" name="add" class="btn btn-success">Submeter</button>
              </div>
            </form>				
          </div>
        </div>
      </div>
	  </div>
  <?php include_once 'include/footer.php';?>
  </body>
</html>
