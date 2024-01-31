
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
                <h3><i class="fa fa-list"></i> Editar Produto</h3>
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
                    <h2>Informação Produto</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                   if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT rem.id_remedio,remedio,rem.descricao,unidade,rem.imagem,categoria,nome_fornecedor,nome_local FROM remedios rem join categoria c on rem.id_categoria = c.id_categoria join fornecedores fd on rem.id_fornecedor = fd.id_fornecedor join local_estoque lt on rem.id_local = lt.id_local  where rem.id_remedio = $id ";
                    $query = mysqli_query($conexao,$sql);
                    $dados = mysqli_fetch_assoc($query);
                    $nome = $dados['remedio'];
                    $unidade = $dados['unidade'];
                    $categoria_anterior = $dados['categoria'];
                    $descricao = $dados['descricao'];
                    $imagem = $dados['imagem'];
                    $local_anterior = $dados['nome_local'];
                    $nome_fornecedor_anterior = $dados['nome_fornecedor'];
                    }   
                  ?>
                  <form id="demo-form2" action="remedio/editar.php" method="POST" data-parsley-validate class="form-horizontal form-label-left" >
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="row">
                      <div class="col-md-8 col-sm-8">
                      <img src="images/uploads/remedios/<?php echo "$imagem";?>" width="200" style="border-radius:10px" alt="<?php echo $nome;?>">
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <a href="alterar_imagem.php?id=<?php echo "$id";?>"><i class="fa fa-image"></i> Alterar Imagem</a>
                       
                      </div><br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <select name="idcategoria" class="form-control">
                          <option value="">Categoria</option>
                          <?php
                            $sql = "SELECT id_categoria,categoria FROM categoria ORDER BY categoria";
                            $query = mysqli_query($conexao,$sql);
                            while($dados = mysqli_fetch_assoc($query)):
                              $id_categoria = $dados['id_categoria'];
                              $categoria = $dados['categoria'];
                          ?>
                          <option value="<?php echo $id_categoria;?>"<?php if($categoria_anterior = $categoria)
                            echo "Selected";?>><?php echo $categoria;?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                      <br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <select name="idlocal" class="form-control">
                          <option value="">Local de Produto</option>
                          <?php
                            $sql = "SELECT id_local,nome_local FROM local_estoque ORDER BY nome_local";
                            $query = mysqli_query($conexao,$sql);
                            while($dados = mysqli_fetch_assoc($query)):
                              $id_local = $dados['id_local'];
                              $nome_local = $dados['nome_local'];
                          ?>
                          <option value="<?php echo $id_local;?>"<?php if($local_anterior = $nome_local)
                            echo "Selected";?>><?php echo $nome_local;?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                      <br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control has-feedback-left" name="remedio" value="<?php echo $nome;?>">
                        <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      </div><br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control has-feedback-left" name="unidade" value="<?php echo $unidade;?>">
                        <span class="fa fa- form-control-feedback left" aria-hidden="true"></span>
                      </div><br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <textarea class="form-control" name="descricao" placeholder="Descrição do Remédios"> <?php echo $descricao;?></textarea>
                      </div>
                      <br><br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <select name="idfornecedor" class="form-control">
                          <option value="">Fornecedor</option>
                          <?php
                            $sql = "SELECT id_fornecedor,nome_fornecedor FROM fornecedores ORDER BY nome_fornecedor";
                            $query = mysqli_query($conexao,$sql);
                            while($dados = mysqli_fetch_assoc($query)):
                              $id_fornecedor = $dados['id_fornecedor'];
                              $nome_fornecedor = $dados['nome_fornecedor'];
                          ?>
                          <option value="<?php echo $id_fornecedor;?>"<?php if($nome_fornecedor_anterior = $nome_fornecedor)
                            echo "Selected";?>><?php echo $nome_fornecedor;?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                      <br><br><br>
                        <div class="col-md-8 col-sm-8 offset-md-2">
                            <a href="medicine.php" class="btn btn-primary" >Voltar</a>
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
