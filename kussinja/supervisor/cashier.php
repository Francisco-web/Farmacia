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
                <h3><i class="fa fa-user"></i> Farmacêutico</h3>
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
                    <h2>Lista de Farmacêuticos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="#addCashier" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-user-plus"></i> Add Farmacêutico</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Telefone</th>
                          <th>Email</th>
                          <th>Cargo</th>
                          <th>Estado</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php
                        $sql = "SELECT nivel.id_nivel_acesso,nome_usuario,bi,telefone,email,nivel,estado_usuario FROM nivel_acesso nivel inner join usuarios u on nivel.id_usuario = u.id_usuario ORDER BY nivel.id_nivel_acesso DESC";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_assoc($query)):
                          $id = $dados['id_nivel_acesso'];
                          $nome = $dados['nome_usuario'];
                          $bi =  $dados['bi'];
                          $telefone = $dados['telefone'];
                          $email =  $dados['email'];
                          $cargo =  $dados['nivel'];
                          $estado=  $dados['estado_usuario'];
                        ?>

                      <tbody>
                        <tr>
                          <td><?php echo $nome;?></td>
                          <td><?php echo $telefone;?></td>
                          <td><?php echo $email;?></td>
                          <td><?php echo $cargo;?></td>
                          <td><?php echo $estado = 1 ? "<span class='btn btn-sm btn-primary text-white'>Activo</span>" : "<span class='btn btn-sm btn-danger text-white'>Inactivo</span>";?></td>
                          <td>
                          <a href="editarFuncionario.php?id=<?php echo $id;?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> editar</a>
                              <a href="funcionario/deletar.php?id=<?php echo $id;?>" onclick="return confirm('Tens Certeza que desejas apagar?')"  class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> apagar</a>
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
    <div class="modal fade" id="addCashier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <div class="title_left">
              </div>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="funcionario/inserir.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
             
              <div class="item form-group">
                <div class="col-md-8 col-sm-8 offset-md-2">
                  <label><i class="fa fa-user"></i> Dados Pessoais</label>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="file" class="form-control has-feedback-left" name="foto" >
                  <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="text" class="form-control has-feedback-left" name= "nome" placeholder="Nome Completo">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="text" class="form-control has-feedback-left" name="bi" placeholder="Nº B.I">
                  <span class="fa fa-desktop form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="email" class="form-control has-feedback-left" name="email" placeholder="Email">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="tel" class="form-control has-feedback-left" name="telefone" placeholder="Número Telefônico">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <input type="tel" class="form-control has-feedback-left" name="endereco" placeholder="Endereço">
                  <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                <select name="cargo" class="form-control">
                  <option value="">Cargo</option>
                  <option value="Farmacêutico">Farmacêutico</option>
                  <option value="Supervisor">Supervisor</option>
                  
                  
                </select>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <label><i class="fa fa-user"></i> Dado de usuário</label>
                  <p>Senha: Número de B.I</p>
                </div>
              </div>
            
              <div class="item form-group">
                <div class="col-md-9 col-sm-9 offset-md-2">
                    <a href="cashier.php" class="btn btn-primary" >Cancelar</a>
                    <button type="submit" name="add" class="btn btn-success">Submeter</button>
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
