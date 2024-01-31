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
                <h3><i class="fa fa-truck"></i> Fornecedor</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de  Fornecedores</h2>
                    <?php
                      if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                      }
                    ?> 
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#addFornecedor" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add fornecedor</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Fornecedor</th>
                          <th>Contacto </th>
                          <th>Email</th>
                          <th>Endereço</th>
                          <th>Produto(os)</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php
                        $sql = "SELECT * FROM fornecedores ORDER BY id_fornecedor DESC";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)):
                          $id = $dados['id_fornecedor'];
                          $nome = $dados['nome_fornecedor'];
                          $telefone = $dados['telefone'];
                          $endereco = $dados['endereco'];
                          $remedios = $dados['descricao'];
                          $email = $dados['email'];
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $nome;?></td>
                          <td><?php echo $telefone;?></td>
                          <td><?php echo $email;?></td>
                          <td><?php echo $endereco;?></td>
                          <td><?php echo $remedios;?></td>
                          
                          <td>
                              <a href="editarFornecedor.php?id=<?php echo $id;?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> editar</a>
                              <a href="fornecedor/deletar.php?id=<?php echo $id;?>" onclick="return confirm('Tens Certeza que desejas apagar?')" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
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
    <!-- Modal Adicionar Fornecedor-->
    <div class="modal fade" id="addFornecedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <div class="title_left">
              </div>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="fornecedor/inserir.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <input type="text" class="form-control has-feedback-left" name ="nome" placeholder="Nome Fornecedor">
                  <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <input type="tel" class="form-control has-feedback-left" name ="telefone" placeholder=" 980-987-979">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <input type="email" class="form-control has-feedback-left" name ="email" placeholder="fornecedor@gmail.com">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <textarea type="text" class="form-control has-feedback-left" name ="endereco" placeholder=" Endereço " id="endereco" cols="2" rows="3"></textarea>
                  <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <input type="text" class="form-control has-feedback-left" name ="remedios" placeholder="Remedios">
                  <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <a href="supplier.php" class="btn btn-primary" >Cancelar</a>
                  <button type="submit" name="add" class="btn btn-success">Submeter</button>
                </div>
              </div>
            </form>		
          </div>
        </div>
      </div>
	  </div>
    <?php include_once 'include/footer.php';?>
  </body>
</html>
