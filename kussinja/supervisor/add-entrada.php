<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php';?>

  <body class="nav-md">
            <?php include 'include/sidebar.php';?>
            <?php include 'include/menufooter.php';?>
          </div>
        </div>

        <?php include 'include/topnav.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4><i class="fa fa-medkit"></i>Entrada de Remédio</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php
              if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
            ?>
            </div>
            <div class="x_panel">
              <div class="x_title">
                <h2> Informação da Entrada</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" action="entrada/inserir.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <select name="remedio" class="form-control">
                    <option>Produto</option>
                      <?php 
                      $sql = "SELECT id_remedio,remedio FROM remedios Order By remedio";
                      $query = mysqli_query($conexao,$sql);
                      while ($dados = mysqli_fetch_array($query)) :
                        $id_remedio = $dados['id_remedio'];
                        $remedio = $dados['remedio'];
                    
                      ?>
                      <option value="<?php echo $id_remedio;?>"><?php echo $remedio;?></option>
                      <?php endwhile;?>
                    </select>
                  </div>
                  <br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" name="qtd_inicial" placeholder="Quantidade">
                    <span class="fa fa-hourglass-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" name="preco_compra" placeholder="Preço de Compra">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" name="percentagemLucro" placeholder="Percentagem de Lucro %">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="date" class="form-control has-feedback-left" name="data_expirar" placeholder="Data de Expiração">
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                    <p>*Data de Expiração</p>
                  </div>
                  <br><br><br>
                  <div class="col-md-12 col-sm-12 ">
                    <a href="entrada.php" class="btn btn-primary">Voltar</a>
                      <button type="submit" name="add-entrada" class="btn btn-success">Submeter</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
