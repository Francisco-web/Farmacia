
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
                <h3><i class="fa fa-list"></i> Editar Remédio</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informação Remédio </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                   if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT r.id,r.nome as remedio,r.codigo,r.descricao,r.imagem,c.nome as categoria FROM remedios r join categorias c on r.idcategoria = c.id ";
                    $query = mysqli_query($conexao,$sql);
                    $dados = mysqli_fetch_assoc($query);
                    $codigo = $dados['codigo'];
                    $nome = $dados['remedio'];
                    $categoria = $dados['categoria'];
                    $descricao = $dados['descricao'];
                    $imagem = $dados['imagem'];
                    }   
                  ?>
                  <form id="demo-form2" action="remedio/editar.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="row">
                    <div class="col-md-8 col-sm-8">
                      <input type="text" class="form-control has-feedback-left" name="codigo"  value="<?php echo $codigo;?>" readonly style="border:none">
                      <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      <p>Codigo </p>
                    </div>
                    <br><br><br>
                    <div class="col-md-8 col-sm-8">
                    <input type="text" class="form-control has-feedback-left" name="idcategoria"  value="<?php echo $categoria;?>" readonly style="border:none">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                    <p>Categoria </p>
                    </div>
                    <br><br><br>
                    <div class="col-md-8 col-sm-8">
                      <input type="text" class="form-control has-feedback-left" name="nome" value="<?php echo $nome;?>" readonly style="border:none">
                      <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                      <p>Nome </p>
                    </div><br><br><br>
                    <div class="col-md-8 col-sm-8">
                      <textarea class="form-control" name="descricao" placeholder="Descrição do Remédios" readonly style="border:none"> <?php echo $descricao;?></textarea>
                      <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                      <p>Descrição</p>
                    </div>
                    <br><br><br><br>
                    <div class="col-md-8 col-sm-8">
                    <input type="file" name="imagem"  class="form-control has-feedback-left" value="<?php echo $imagem;?>"readonly style="border:none">
                    <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                    <br><br>
                    <div class="item form-group">
                      <div class="col-md-8 col-sm-8 offset-md-2">
                        <a href="medicine.php" class="btn btn-primary" >Cancelar</a>
                        <a href="editarRemedio.php?id=<?php echo $id;?>" class="btn btn-success text-white">Alterar</a>                   
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
