<section class="content">
        <?php
          $url="http://localhost/tests/PHP-collab/ApiRest/controllers/Clientes.php?op=GetAll";
          $curl=curl_init();
          curl_setopt($curl,CURLOPT_URL,$url);
          curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
          $result=json_decode(curl_exec($curl));
        ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($result as $row) { ?>
                    <tr>
                      <td><?php echo $row->Cliente_ID; ?></td>
                      <td><?php echo $row->CompanyName; ?></td>
                      <td><?php echo $row->Telefono; ?></td>
                      <td><?php echo $row->Email; ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <!-- /.card-footer-->
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>