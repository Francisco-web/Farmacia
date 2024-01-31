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
                <h3><i class="fa fa-user"></i> Perfil</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informação do Perfil</h2>
                    <div class="clearfix"></div>
                    <?php
                      if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                      }
                    ?>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                      </div>
                      <h3><?php echo $nome;?></h3>

                      <ul class="list-unstyled user_data">
                        <li>
                          <i class="fa fa-user user-profile-icon"></i> <?php echo $cargo;?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-9 col-sm-9  profile_left">
                    <form id="demo-form2" action="perfil/perfil.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                      
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"><strong><i class="fa fa-user"></i> Informação Pessoal</strong></label>
                  </div>
                    <input type="hidden" required="required"  class="form-control" name="id" value="<?php echo $idFarmaceutico;?>" >
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Nome Completo <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8">
                      <input type="text" required="required"  class="form-control" name="nome" value="<?php echo $nome;?>" >
                    </div>
                  </div>  
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="email"  name="email" value="<?php echo $email;?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Telefone</label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="tel" name="telefone"  value="<?php echo $telefone;?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"><strong><i class="fa fa-key"></i>Informação da Conta</strong></label>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Usuário</label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="email" name="email"  value="<?php echo $email;?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Palavra-Passe</label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="password" name="senha"  value="<?php echo $senha;?>">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <button class="btn btn-primary" type="submit" name="alterar_senha" type="button">Alterar Senha</button>
                      <button type="submit" name="alterar_perfil" class="btn btn-success">Alterar perfil</button>
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
    </div>

    <?php include_once 'include/footer.php';?>
  </body>
</html>
