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
                <h4><i class="fa fa-medkit"></i> Adicionar Pedido </h3>
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
                <h2> Informação do Pedido</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" action="carrinho/add.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <select name="id_entrada" class="form-control">
                    <option value="">Produto</option>
                      <?php
                        $sql ="SELECT * FROM entradas ed inner join remedios rem on ed.id_remedio = rem.id_remedio WHERE estado_entrada !='Inactivo' ORDER BY remedio";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_array($query)):
                        $id_entrada = $dados['id_entrada']; 
                        $remedio = $dados['remedio']; 
                        $unidade = $dados['unidade']; 
                      ?>
                      <option value="<?php echo $id_entrada?>"><?php echo $id_entrada?>-<?php echo $remedio?>/ <?php echo $unidade?></option>
                      <?php endwhile;?>
                    </select>
                  </div>
                  <br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="number" class="form-control has-feedback-left" name="qtd" placeholder="Quantidade" autocomplete="off">
                    <span class="fa fa-hourglass-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <br><br><br>
                  <div class="col-md-12 col-sm-12 ">
                    <button type="submit" name="add_carrinho" class="btn btn-success">Adicionar</button>
                  </div>
                </form>
              </div>
            </div>
            <?php 
            //lISTA DE COMPRA
            $sql ="SELECT * FROM carrinho";
            $query = mysqli_query($conexao,$sql);
            $num=1;
            $grandeTotal=0;
            if(mysqli_num_rows($query) >  0){

            
            ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2> Lista de Compra</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Remédio</th>
                        <th>Preço Unit.</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Acção</th>
                      </tr>
                    </thead>
                    <?php
                      $contador = 0;
                      $sql ="SELECT car.id_carrinho,car.id_entrada,rem.remedio,rem.imagem,ent.qtd_movida,ent.preco_venda,car.qtd_remedio FROM carrinho car inner join entradas ent on car.id_entrada = ent.id_entrada join remedios rem on ent.id_remedio = rem.id_remedio join nivel_acesso nivel on car.id_farmaceutico = nivel.id_nivel_acesso Where id_farmaceutico ='$idFarmaceutico ' ORDER BY remedio";
                      $query = mysqli_query($conexao,$sql);
                      while($dados = mysqli_fetch_array($query)):
                      $id_entrada = $dados['id_entrada']; 
                      $id_carrinho = $dados['id_carrinho']; 
                      $imagem = $dados['imagem'];
                      $qtd_carrinho= $dados['qtd_remedio'];
                      $qtd_produto = $dados['qtd_movida'];
                      $preco_remedio = $dados['preco_venda'];
                      $remedio = $dados['remedio']; 
                      
                      //Calculo do Total de cada Produto
                      $sub_total = $preco_remedio * $qtd_carrinho; 
                    ?>
                    <tbody>
                      <tr>
                        <td><?php $contador ++; echo $contador;?></td>

                        <td><input type="text" required="required" value="<?php echo $remedio ?>" class="form-control" name="remedio" placeholder="Remédio" id="remedio" readonly></td>
                        
                        <td><input type="text" required="required" class="form-control" value="<?php echo number_format($preco_remedio,2,",",".") ?>" name="preco" placeholder="Preço Unitário" id="preco" readonly></td>
                        
                        <td>
                          <form id="demo-form2" action="carrinho/carrinho.php" method="POST" ata-parsley-validate class="form-horizontal form-label-left">
                            <input type="hidden" required="required" value="<?php echo $id_carrinho ?>" class="form-control" name="carrinho_id" placeholder="id Carrinho" readonly>

                            <div class="col-md-9 col-sm-4">
                              <input type="number" required="required" min="1" max="<?php echo $qtd_produto?>" value="<?php echo $qtd_carrinho ?>" class="form-control" name="qtd_remedio" placeholder="Quantidade">
                            </div>
                            <div class="col-md-12 col-sm-4 ">
                              <button type="submit" class="btn btn-secondary" name="actualizar">Actualizar</button>
                            </div>  
                            </form>
                        </td>

                        <td><input type="text" required="required" class="form-control" id="valorTotal" name="valorTotal" placeholder="0.00"value="<?php echo number_format($sub_total,2,",",".")?>" readonly></td>

                        <td>
                          <a href="carrinho/deletar.php?id=<?php echo $id_carrinho;?>" onclick="return confirm('Tens Certeza que desejas Remover?')" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> </a>
                        </td>
                      </tr>
                    </tbody>
                    <?php 
                      $grandeTotal = $grandeTotal +($preco_remedio * $qtd_carrinho);
                      $num++;
                      endwhile;
                    ?>
                        
                      <th>Total: </th>
                      <td><?php echo number_format($grandeTotal,2,",",".");?> Kz</td>
                  </table>
                  <br>
                  <form id="demo-form2" action="venda/venda.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <input type="text" class="form-control has-feedback-left" name="valorPago" placeholder="Valor Pago" autocomplete="off">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <input type="hidden" class="form-control has-feedback-left" value="<?php echo $grandeTotal?>" name="grandeTotal">
                      </div>
                      <br><br><br>
                      <div class="col-md-12 col-sm-12 ">
                        <button type="submit" name="cancelar_venda" class="btn btn-danger">Cancelar Venda</button> 
                        <button type="submit" name="add_venda" class="btn btn-success">Processar Venda</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php }else {
              $_SESSION['msg'] = "<div class='alert alert-secondary' role='alert'>Lista de Compra está vazia! Adiciona Produtos a Lista</div>";
            } //fim Lista de Compra?>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
