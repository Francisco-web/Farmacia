
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
                <h3><i class="fa fa-list"></i> Editar Fornecedor</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informação Fornecedor</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                   if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM fornecedores WHERE id_fornecedor = '$id'";
                    $query = mysqli_query($conexao,$sql);
                    $dados = mysqli_fetch_assoc($query);
                    $nome = $dados['nome_fornecedor'];
                    $telefone = $dados['telefone'];
                    $endereco = $dados['endereco'];
                    $remedios = $dados['descricao'];
                    $email = $dados['email'];
                    }   
                  ?>
                  <form id="demo-form2" action="fornecedor/editar.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                      <div class="item form-group">
                        <div class="col-md-8 col-sm-8 offset-md-2">
                          <input type="text" class="form-control has-feedback-left" name ="nome" value="<?php echo $nome;?>">
                          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-8 col-sm-8 offset-md-2">
                          <input type="tel" class="form-control has-feedback-left" name ="telefone" value="<?php echo $telefone;?>">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-8 col-sm-8 offset-md-2">
                          <input type="email" class="form-control has-feedback-left" name ="email" value="<?php echo $email;?>">
                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-8 col-sm-8 offset-md-2">
                          <textarea type="text" class="form-control has-feedback-left" name ="endereco" id="endereco" cols="2" rows="3"><?php echo $endereco;?></textarea>
                          <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-8 col-sm-8 offset-md-2">
                          <input type="text" class="form-control has-feedback-left" name ="remedios" value="<?php echo $remedios;?>">
                          <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                      <div class="col-md-8 col-sm-8 offset-md-2">
                          <a href="supplier.php" class="btn btn-primary" >Voltar</a>
                          <button type="submit" name="update" class="btn btn-success">Submeter</button>
                      </div>
                      </div>
                  </form>
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
