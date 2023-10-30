<!DOCTYPE html>
<html lang="en">
<?php include_once 'include/header.php';?>

  <body class="nav-md">
            <?php include 'include/sidebar.php';?>
            <?php include 'include/menufooter.php';?>
          </div>
        </div>

        <?php include_once 'include/topnav.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cog"></i> Definição da Empresa</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Configuração do Sistema </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Nome da Empresa <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required="required" class="form-control" name="empresa" placeholder="Farmácia ...">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Endereço <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                      <textarea class="form-control " name="endereco" placeholder="Luanda, Angola"></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control" type="email" name="email" placeholder="farmacia@gmail.com">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Contacto 1</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control" type="text" name="contacto1" placeholder="09486087489">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Contacto 2</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control" type="text" name="contacto2"  placeholder="09486087489">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Logo</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control" name="logo" type="file">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <button class="btn btn-primary" type="button">Cancelar</button>
                      <button type="submit"name="add-empresa" class="btn btn-success">Submeter</button>
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
