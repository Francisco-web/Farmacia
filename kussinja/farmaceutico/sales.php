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
                    <form action="carrinho.php" method="POST">
                    <div class="col-md-12 col-sm-12 ">
                    <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Remédio</th>
                          <th>Quantidade</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>
                          <select id="remedio" name="id_entrada" class="form-control">
                            <option>Nenhum</option>
                            <?php
                              $sql ="SELECT ed.id_entrada,rem.remedio,rem.imagem,rem.unidade,rem.descricao,ed.qtd_inicial,ed.qtd_movida,ed.estado_entrada,ed.preco_compra,ed.preco_venda FROM entradas ed inner join remedios rem on ed.id_remedio = rem.id_remedio ORDER BY remedio";
                              $query = mysqli_query($conexao,$sql);
                              while($dados = mysqli_fetch_array($query)):
                              $id_entrada = $dados['id_entrada']; 
                              $remedio = $dados['remedio']; 
                            ?>
                            <option value="<?php echo $id_entrada?>"><?php echo $remedio?></option>
                            <?php endwhile;?>
                          </select>
                        </td>
                          <td><input type="text" required="required" class="form-control" name="qtd" placeholder="Insira Qtd" id="qtd" onchange="calcular()"></td>
                          
                          <td><input type="text" required="required" class="form-control" id="valorTotal" name="valorTotal" placeholder="0.00" readonly></td>
                        </tr>
                      </tbody>
                    </table>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#" name="apagar" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
                    </ul>
                    <ul class="nav navbar-left panel_toolbox">
                    <button name="addMais" class="btn btn-sm btn-success text-white"><i class="fa fa-plus"></i> Add Mais</button>
                    </ul><br><br><br>
                    </div>
                    </form>
                    <div class="col-md-3 col-sm-3  profile_left">
                    </div>
                    <div class="col-md-9 col-sm-9  profile_left">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Sub Total <span class="required">(Kz)</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" name="subTotal"  readonly placeholder="0.00">
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
    <script>
      function calcular() {
        var qtd = document.getElementById('qtd');
        var preco = document.getElementById('preco').value;
       console.log(qtd_remedio);

      }
    </script>
  </body>
</html>
