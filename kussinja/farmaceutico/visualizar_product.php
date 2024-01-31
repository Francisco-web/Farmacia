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
                <h3><i class="fa fa-shopping-cart"></i> Detalhes do Produto</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                  <table class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>imagem</th>
                          <th>Factura No.</th>
                          <th>Expirar</th>
                          <th>Produto</th>
                          <th>Qtd</th>
                          <th>Preço</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <?php 
                        if(isset($_GET['id'])){
                          $id_produto=$_GET['id'];
                          $sql = "SELECT r.descricao,r.imagem,r.remedio,r.unidade,vend.factura_no,vend.qtd,e.preco_Venda,vend.total,e.vancimento,cat.categoria,ls.nome_local,fn.nome_fornecedor FROM vendas vend join entradas e on vend.id_entrada = e.id_entrada join remedios r on e.id_remedio = r.id_remedio join categoria cat on r.id_categoria = cat.id_categoria join local_estoque ls on r.id_local = ls.id_local join fornecedores fn on r.id_fornecedor=fn.id_fornecedor WHERE vend.id_nivel_acesso = '$idFarmaceutico' and e.id_remedio = '$id_produto' Order by id_venda desc";
                          $query = mysqli_query($conexao,$sql);
                          $dados = mysqli_fetch_assoc($query);
                          $imagem = $dados['imagem'];
                          $remedio = $dados['remedio'];
                          $quantidade = $dados['qtd']; 
                          $preco = $dados['preco_Venda']; 
                          $total = $dados['total']; 
                          $factura = $dados['factura_no']; 
                          $vencimento = $dados['vancimento']; 
                          $unidade = $dados['unidade']; 
                          $local_estoque = $dados['nome_local']; 
                          $categoria = $dados['categoria']; 
                          $fornecedor = $dados['nome_fornecedor']; 
                          $descricao = $dados['descricao']; 
                        }
                      ?>
                      <tbody>
                        <tr>
                          <td><img src="../imagens/uploads/remedios/<?php echo $imagem; ?>" alt="<?php echo $remedio; ?>" width="50" style="border-radius:10px"></td>
                          <td><?php echo $factura; ?></td>
                          <td><?php echo $vencimento; ?></td>
                          <td><?php echo $remedio; ?></td>
                          <td><?php echo $quantidade; ?></td>
                          <td><?php echo $preco; ?></td>
                          <td><?php echo $total; ?></td>
                        </tr>
                      </tbody>
                      <thead>
                          <tr>
                            <th>unidade</th>
                            <th>descricao</th>
                            <th>Categoria</th>
                            <th>Local</th>
                            <th>Fornecedor</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td><?php echo $unidade; ?></td>
                          <td><?php echo $descricao; ?></td>
                          <td><?php echo $categoria; ?></td>
                          <td><?php echo $local_estoque; ?></td>
                          <td><?php echo $fornecedor; ?></td>
                        </tr>
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

    <?php include_once 'include/footer.php';?>
  </body>
</html>
