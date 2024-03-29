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
                <h3><i class="fa fa-medkit"></i> Entrada de Produto</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }?>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Produtos Registrados</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add-entrada.php" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Entrada</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Produto</th>
                          <th>Preço Compra</th>
                          <th>Preço Unit.</th>
                          <th>Estq. Inicial</th>
                          <th>Estq. Actual</th>
                          <th>% Estoque</th>
                          <th>Estado</th>
                          <th>Receita</th>
                          <th>Lucro</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <?php
                        $sql ="SELECT ed.id_entrada,rem.remedio,rem.imagem,rem.unidade,rem.descricao,ed.qtd_inicial,ed.qtd_movida,ed.estado_entrada,ed.preco_compra,ed.preco_venda FROM entradas ed inner join remedios rem on ed.id_remedio = rem.id_remedio 
                              join nivel_acesso nivel on ed.id_nivel_acesso = nivel.id_nivel_acesso join categoria cat on rem.id_categoria = cat.id_categoria join local_estoque loc on rem.id_local = loc.id_local 
                              join fornecedores fo on rem.id_fornecedor = fo.id_fornecedor ORDER BY remedio";
                        $query = mysqli_query($conexao,$sql);
                        while($dados = mysqli_fetch_array($query)):
                        $id_entrada = $dados['id_entrada']; 
                        $remedio = $dados['remedio']; 
                        $preco_compra = $dados['preco_compra'];
                        $preco_venda = $dados['preco_venda']; 
                        $qtd_inical = $dados['qtd_inicial'];
                        $qtd_movida = $dados['qtd_movida']; 
                        $estado_entrada = $dados['estado_entrada'];
                        $percentagem_estoque = $qtd_movida * 0.1 ;
                        $receita = $preco_venda * $qtd_inical;
                        $lucro = $receita / 2 ; 
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $remedio;?></td>
                          <td><?php echo $preco_compra;?></td>
                          <td><?php echo $preco_venda;?></td>
                          <td><?php echo $qtd_inical;?></td>
                          <td><?php echo $qtd_movida;?></td>
                          <td><?php echo $percentagem_estoque >= 100 ? "100%":"$percentagem_estoque%"; ?></td>
                          <td><?php $estado_entrada; if($estado_entrada == 'Estoque Confortável'){echo"<span class='text-success'>$estado_entrada</span>";}elseif($estado_entrada == 'Estoque Baixo'){echo"<span class='btn btn-sm btn-warning text-white'>$estado_entrada</span>";}elseif($estado_entrada == 'Sem Estoque'){echo"<span class='btn btn-sm btn-danger text-white'>$estado_entrada</span>";}?></td>
                          <td><?php echo number_format($receita,2,",",".");?></td>
                          <td><?php echo number_format($lucro,2,",",".");?></td>
                          <td>
                              <a href="" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> </a>
                              <a class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> </a>
                              <a href="entrada/deletar.php?deletar&id=<?php echo $id_entrada;?>" onclick = "return confirm('Tens Certeza que desejas apagar?')" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php endwhile;?>
                    </table>
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
