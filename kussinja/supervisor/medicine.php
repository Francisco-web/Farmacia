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
                <h3><i class="fa fa-medkit"></i> Remédio</h3>
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
                    <h2>Lista de Produtos Registrados</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#addRemedio" data-toggle="modal" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Produto</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Imagem</th>
                          <th>Produto</th>
                          <th>Un.</th>
                          <th>Descrição</th>
                          <th>Categoria</th>
                          <th>Local</th>
                          <th>Fornecedor</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php
                        $sql = "SELECT id_remedio,remedio,unidade,rem.descricao,imagem,categoria,nome_fornecedor,nome_local FROM remedios rem join categoria cg on rem.id_categoria = cg.id_categoria join local_estoque lt on rem.id_local = lt.id_local join fornecedores fd on rem.id_fornecedor = fd.id_fornecedor ";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)):
                          $id = $dados['id_remedio'];
                          $nome = $dados['remedio'];
                          $categoria = $dados['categoria'];
                          $descricao = $dados['descricao'];
                          $imagem = $dados['imagem'];
                          $local = $dados['nome_local'];
                          $unidade = $dados['unidade'];
                          $fornecedor = $dados['nome_fornecedor'];
                      ?>

                      <tbody>
                        <tr>
                          <td><img src="../imagens/uploads/remedios/<?php echo "$imagem";?>" width="50" style="border-radius:10px" alt="Leite Nan"></td>
                          <td><?php echo $nome;?></td>
                          <td><?php echo $unidade;?></td>
                          <td><?php echo $descricao;?></td>
                          <td><?php echo $categoria;?></td>
                          <td><?php echo $local;?></td>
                          <td><?php echo $fornecedor;?></td>
                          <td>
                              <a href="editarRemedio.php?id=<?php echo $id;?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> editar</a>
                              <a href="remedio/deletar.php?id=<?php echo $id;?>" onclick="return confirm('Tens Certeza que desejas apagar?')"  class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
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
    <div class="modal fade" id="addRemedio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <div class="title_left">
              </div>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="remedio/inserir.php" method="POST" enctype="multipart/form-data" a-parsley-validate class="form-horizontal form-label-left">
              <div class="row">
              <br><br><br>
              <div class="col-md-12 col-sm-12">
              <select name="idcategoria" class="form-control">
                <option value="">Categoria</option>
                <?php
                  $sql = "SELECT id_categoria,categoria FROM categoria ORDER BY categoria";
                  $query = mysqli_query($conexao,$sql);
                  while($dados = mysqli_fetch_assoc($query)):
                    $id = $dados['id_categoria'];
                    $categoria = $dados['categoria'];
                ?>
                <option value="<?php echo $id;?>"><?php echo $categoria;?></option>
                <?php endwhile;?>
              </select>
              </div>
              <br><br><br>
              <div class="col-md-12 col-sm-12">
                <input type="text" class="form-control has-feedback-left" name="nome" placeholder="Nome do Remédio">
                <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
              </div><br><br><br>
              <div class="col-md-12 col-sm-12">
                <input class="form-control" name="unidade" placeholder="Unidade do Remédio"/>
              </div><br><br><br>
              <div class="col-md-12 col-sm-12">
              <select name="local_remedio" class="form-control">
                <option value="">Local de Remédio</option>
                <?php
                  $sql = "SELECT id_local,nome_local FROM local_estoque ORDER BY nome_local";
                  $query = mysqli_query($conexao,$sql);
                  while($dados = mysqli_fetch_assoc($query)):
                    $id = $dados['id_local'];
                    $nome_local = $dados['nome_local'];
                ?>
                <option value="<?php echo $id;?>"><?php echo $nome_local;?></option>
                <?php endwhile;?>
              </select>
              </div>
              </div><br>
               <div class="col-md-12 col-sm-12">
                <textarea class="form-control" name="descricao" placeholder="Descrição do Remédio"></textarea>
              </div><br><br><br><br>
              <div class="col-md-12 col-sm-12">
              <select name="fornecedor" class="form-control">
                <option value="">Fornecedor</option>
                <?php
                  $sql = "SELECT id_fornecedor,nome_fornecedor FROM fornecedores ORDER BY nome_fornecedor";
                  $query = mysqli_query($conexao,$sql);
                  while($dados = mysqli_fetch_assoc($query)):
                    $id = $dados['id_fornecedor'];
                    $nome_fornecedor = $dados['nome_fornecedor'];
                ?>
                <option value="<?php echo $id;?>"><?php echo $nome_fornecedor;?></option>
                <?php endwhile;?>
              </select>
              </div>
              <br><br><br>
              <div class="col-md-12 col-sm-12">
                <input type="file" name="imagem"  class="form-control has-feedback-left" >
                <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
              </div><br><br><br>
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
