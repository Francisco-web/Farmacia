<!DOCTYPE html>
<html lang="en">
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
                <h3><i class="fa fa-desktop"></i> Despesas</h3>
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
                    <h2>Lista de Despesas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#addDespesa" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add Despesa</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Despesa</th>
                          <th>Valor</th>
                          <th>Responsável</th>
                          <th>Data</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <?php
                        $sql = "SELECT id_despesa,id_nivel_acesso,despesa,valor_despesa,estado_despesa,data_despesa	
                        FROM despesas ";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)):
                          $id = $dados['id_despesa'];
                          $nome = $dados['id_nivel_acesso'];
                          $despesa =  $dados['despesa'];
                          $valor = $dados['valor_despesa'];
                          $estado_despesa =  $dados['estado_despesa'];
                          $data_despesa =  $dados['data_despesa'];
                        ?>

                      <tbody>
                        <tr>
                          <td><?php echo $despesa;?></td>
                          <td><?php echo number_format($valor,2,",",".");?></td>
                          <td><?php echo $nome;?></td>
                          <td><?php echo $data_despesa;?></td>
                          <td>
                              <a href="despesa/editar.php?update&id=<?php echo $id;?>&estado=<?php echo $estado_despesa;?>" onclick="return confirm('Tens Certeza que desejas alterar o Estado?')"><?php $estado = $estado_despesa;?><?php if($estado == 'Pendente'){echo"<button class='btn btn-sm btn-info text-white'>Pendente</button>";}elseif($estado == 'Liquidada'){echo"<button class='btn btn-sm btn-success text-white'>$estado</button>";}elseif($estado == 'Expirou'){echo "<button class='btn btn-sm btn-warning text-white'>$estado</button>";}?></a>
                          </td>
                        </tr>
                        <?php endwhile;?>
                      </tbody>
                    </table>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Adicionar Funcionário-->
    <div class="modal fade" id="addDespesa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <div class="title_left">
              </div>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="despesa/inserir.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
             
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <label><i class="fa fa-"></i> Registrar Despesa</label>
                </div>
              </div>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <textarea name="despesa" placeholder="Descricção" class="form-control has-feedback-left" id="despesa" cols="3" rows="3">
                  </textarea>
                  <span class="fa fa-desktop form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <select name="estado_despesa" class="form-control has-feedback-left" id="">
                    <option value="">Estado da Despesa</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Liquidada">Liquidada</option>
                    <option value="Expirou">Expirou</option>
                  </select>
                  <span class="fa fa- form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="tel" class="form-control has-feedback-left" name="valor_despesa" placeholder="Valor Monetário">
                  <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="datetime-local" class="form-control has-feedback-left" name="data_despesa" placeholder="Data">
                  <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-9 col-sm-9 offset-md-2">
                    <a href="cashier.php" class="btn btn-primary" >Cancelar</a>
                    <button type="submit" name="add_despesa" class="btn btn-success">Submeter</button>
                </div>
              </div>
            </form>					
          </div>
        </div>
      </div>
	</div>
    <?php include_once 'include/footer.php';?>
  </body>
</html>
