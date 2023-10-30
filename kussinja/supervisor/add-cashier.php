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
                <h3><i class="fa fa-user-plus"></i> Add Farmacêutico</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Informação do Farmacêutico</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <label><i class="fa fa-user"></i> Dados Pessoais</label>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" nome="nome" placeholder="Nome Completo">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" name="bi" placeholder="Nº B.I">
                    <span class="fa fa-desktop form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <select class="form-control has-feedback-left" name="genero" id="genero">
                      <option value="">Gênero</option>
                      <option value="Feminino">Feminino</option>
                      <option value="Masculino">Masculino</option>
                    </select>
                    <span class="fa fa- form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="email" class="form-control has-feedback-left" name="email" placeholder="ex. farmaceutico@gmail.com">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="tel" class="form-control has-feedback-left" name="telefone" placeholder="ex. 999-333-222">
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <select class="form-control has-feedback-left" name="cargo" id="cargo">
                      <option value="">Cargo</option>
                      <option value="Admin">Admin</option>
                      <option value="Farmaceutico">Farmacêutico</option>
                      <option value="Supervisor">Supervisor</option>
                    </select>
                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <label><i class="fa fa-user"></i> Dado de usuário</label>
                    <p>Senha: Número de B.I</p>
                  </div>
                </div>
                
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                      <button class="btn btn-primary" type="button">Cancelar</button>
                      <button type="submit" class="btn btn-success">Submeter</button>
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
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
