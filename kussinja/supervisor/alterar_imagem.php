
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
                <h3><i class="fa fa-list"></i> Editar Imagem do Remédio</h3>
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
                    <h2>Imagem do Remédio </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php
                   if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT imagem,remedio FROM remedios where id_remedio = $id ";
                    $query = mysqli_query($conexao,$sql);
                    $dados = mysqli_fetch_assoc($query);
                    $imagem = $dados['imagem'];
                    $remedio = $dados['remedio'];
                    }   
                  ?>
                  <form id="demo-form2" action="remedio/editar.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" >
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="row">
                      <div class="col-md-8 col-sm-8">
                      <img src="images/uploads/remedios/<?php echo "$imagem";?>" width="200" style="border-radius:10px" alt="<?php echo $remedio;?>">
                      </div>
                      <br><br><br>
                      <div class="col-md-8 col-sm-8">
                        <input type="file" class="form-control has-feedback-left" name="imagem">
                        <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                      </div><br><br><br>
                      <br><br><br>
                        <div class="col-md-8 col-sm-8 offset-md-2">
                            <a href="editarRemedio.php?id=<?php echo $id;?>" class="btn btn-primary" >Voltar</a>
                            <button type="submit" name="alterar_imagem" class="btn btn-success">Submeter</button>
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
