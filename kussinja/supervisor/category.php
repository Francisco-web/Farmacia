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
                <h3><i class="fa fa-medkit"></i> Categoria Remédios</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php
              if (isset($_SESSION['msg'])) 
              {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
            ?>  
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Categoria de Remédios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#addCategoria" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add Categoria</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Categoria</th>
                            <th>Descrição</th>
                            <th>Acção</th>
                          </tr>
                        </thead>
                        <?php
                          $sql = "SELECT id_categoria,categoria,descricao FROM categoria ORDER BY categoria DESC";
                          $query = mysqli_query($conexao,$sql);
                          while($dados = mysqli_fetch_assoc($query)):
                            $id = $dados['id_categoria'];
                            $categoria = $dados['categoria'];
                            $descricao = $dados['descricao'];
                          ?>
                        <tbody>
                          <tr>
                            <td><?php echo $categoria;?></td>
                            <td><?php echo $descricao;?></td>
                            <td>
                                <a href="editarCategoria.php?id=<?php echo $id;?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> editar</a>
                                <a href="categoria/deletar.php?id=<?php echo $id;?>" onclick="return confirm('Tens Certeza que desejas apagar?')" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
                            </td>
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
    <!-- Modal Adicionar Categoria-->
    <div class="modal fade" id="addCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <div class="title_left">
              </div>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="categoria/inserir.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <input type="text" class="form-control has-feedback-left" autocomplete="off" name="categoria" placeholder="Nome Categoria">
                  <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <input type="text" class="form-control has-feedback-left" autocomplete="off" name="descricao" placeholder="Descrição">
                  <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
            
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <a href="category.php" class="btn btn-primary" >Cancelar</a>
                  <button type="submit" name="add-categoria" class="btn btn-success">Submeter</button>
                </div>
              </div>
            </form>        				
          </div>
        </div>
      </div>
		</div>
    <?php include 'include/footer.php';?>
  </body>
</html>
