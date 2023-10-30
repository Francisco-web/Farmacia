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
                <h3><i class="fa fa-shopping-cart"></i> Pedido</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informação Pedido</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker"></i> Cassequel Maiaga, Luanda, Angola
                        </li>

                        <li>
                          <i class="fa fa-phone"></i> +6399812765251
                        </li>
                        <li>
                          <i class="fa fa-envelope"></i> fkussinja@gmail.com
                        </li>
                        <li>
                          <i class="fa fa-globe"></i> farmaciakussinja.com.ao
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-9 col-sm-9  profile_left">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Codigo Pedido <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" placeholder="Pedido-101-21">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Tipo de Pagamento <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" placeholder="Cash" readonly style="border:none">
                    </div>
                  </div>
                  </form>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                    <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Remédio</th>
                          <th>Quantidade</th>
                          <th>Preço <span class="required">(Kz)</span></th>
                          <th>Tipo Desconto</th>
                          <th>Desconto</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>
                          <select name="remedio" class="form-control">
                            <option>Nenhum</option>
                            <option>Medicine one</option>
                            <option>Medicine two</option>
                            <option>Medicine three</option>
                            <option>Medicine four</option>
                          </select>
                        </td>
                          <td><input type="text" required="required" class="form-control" name="qtd" placeholder="Insira Qtd"></td>
                          <td><input type="text" required="required" class="form-control" name="precoUnit" placeholder="Preço Unit"></td>
                          <td>
                          <select name="tipoDesconto" class="form-control">
                            <option>Nenhum</option>
                            <option>fixed</option>
                          </select></td>
                          <td><input type="text" required="required" class="form-control" name="valorDesconto" placeholder="Preço Desconto"></td>
                          <td><input type="text" required="required" class="form-control" name="qtdTotal" placeholder="0.00" readonly></td>
                        </tr>
                      </tbody>
                    </table>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#" name="apagar" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
                    </ul>
                    <ul class="nav navbar-left panel_toolbox">
                    <a href="#" name="addMais" class="btn btn-sm btn-success text-white"><i class="fa fa-plus"></i> Add Mais</a>
                    </ul><br><br><br>
                    </div>
                    <div class="col-md-3 col-sm-3  profile_left">
                    </div>
                    <div class="col-md-9 col-sm-9  profile_left">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Sub Total <span class="required">(Kz)</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" name="subTotal"  readonly placeholder="0.00">
                      <span class="required">*Sem IVA</span>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Desconto <span class="required">(Kz)</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" name="totalDesconto" placeholder="0.00" readonly style="border:none">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Iva <span class="required">(Kz)</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" name="valorIva" placeholder="0.00">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Total Iva<span class="required">(Kz)</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" name="totalIva" placeholder="0.00" readonly style="border:none">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Total Geral <span class="required">(Kz)</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" name="totalGeral" placeholder="0.00" readonly style="border:none">
                    </div>
                  </div>
                  <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <button type="submit" name="btn-pedir" class="btn btn-success">Submeter Pedido</button>
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

    <?php include 'include/footer.php';?>
  </body>
</html>
