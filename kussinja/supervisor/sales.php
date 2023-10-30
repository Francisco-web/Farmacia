<!DOCTYPE html>
<html lang="PT">
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
                <h3><i class="fa fa-desktop"></i> Vendas</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Venda</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Venda Num.</th>
                          <th>Data</th>
                          <th>Total</th>
                          <th>Farmacêutico</th>
                          <th>Acção</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>SLS-101-21</td>
                          <td>Nov 6, 2021</td>
                          <td>Php 20,000.00(Kz)</td>
                          <td>John Kelly</td>
                          <td>
                              <a href="sales-detail.php" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> Ver detalhes</a>
                          </td>
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
